<?php
function posts()
{
    $conn = mysqli_connect('rdbms.strato.de', 'dbu2577448', 'KabouterST06', 'dbs10041809');
    if (!$conn) {
        die('Connection Failed' . mysqli_connect_error());
    }

    $result = mysqli_query($conn, 'SELECT * FROM `posts`');

    $collection = [];
    if (mysqli_num_rows($result) > 0); {
        while ($row = mysqli_fetch_assoc($result)) {
            $collection[] = $row;
        }
    }
    if (isset($_SESSION['status'])){
        $rend = "<form method= 'post' action=''>";
        $rend .= "<textarea rows='1'cols='25'name='createTitel' placeholder='Titel' required></textarea><br>";
        $rend .= "<textarea rows='3'cols='25'name='createPost'placeholder='Tekst' required></textarea><br>";
        $rend .= "<button type='submit'>Post</button><br>";
        $rend .= "</form>";
        $rend .= "<div class='container'>";
        foreach ($collection as $value) {
            $rend .= "<div class='post'><table class='border'>";
            $rend .= "<tr><td style='text-align: left'><b>" . $value['Titel']."</b></td><td>Username</td></tr>";
            $rend .= "<tr><td>" . $value['Tekst']."</td></tr>";
            $rend .= "</table></div>";
        }
        $rend .= "<div>";
        if (!empty($_POST['createPost']) && !empty($_POST["createTitel"])) {
            if (isset($_POST['createPost']) && isset($_POST["createTitel"])) {
                $createPost = $_POST['createPost'];
                $createTitel = $_POST['createTitel'];
                $sql = "INSERT INTO posts (id, Titel, Tekst)
                VALUES ('', '$createTitel', '$createPost')";
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['status'] = true;
                    header("Refresh:0");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }

    
    else{
        $rend = "jij kan de posts niet zien, want je bent niet ingelogd";
        
    }
    return $rend;
}
