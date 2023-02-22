<?php
    function register(){
        $conn = mysqli_connect('rdbms.strato.de', 'dbu2577448', 'KabouterST06', 'dbs10041809');
    if (!$conn) {
        die('Connection Failed' . mysqli_connect_error());
    }

    $result = mysqli_query($conn, 'SELECT * FROM `users`');

    $collection = [];
    if (mysqli_num_rows($result) > 0); {
        while ($row = mysqli_fetch_assoc($result)) {
            $collection[] = $row;
        }
    }
        $render = '<div class="login">';
        $render .= "<h2>Create Account</h2>";
        $render .= "<table><tr><form method= 'post' action=''><input name= 'createUsername' placeholder= 'Username' required></input></tr>";
        $render .= '<tr><input type="password" name= "createPassword" placeholder= "Password" required></input></tr>';
        $render .= '<tr><button style="margin-top: 3px;" type="submit" id= "submit" name="submit" value="Create" required>Create</button>';
        $render .= "</form></tr></table>";
        

        $render .= '<a href="index.php?content=login" id="rbutton"> Heb al een account?</a><br></div>';
    if (!empty($_POST['createUsername']) && !empty($_POST["createPassword"])) {
        if (isset($_POST['createUsername']) && isset($_POST["createPassword"])) {
            $createUsername = $_POST['createUsername'];
            $createPassword = md5($_POST['createPassword']);
            $sql = "INSERT INTO users (id, username, password, profile)
            VALUES ('', '$createUsername', '$createPassword','1')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['status'] = true;
                $_SESSION['ingelogde'] = $_POST['createUsername'];
                foreach ($collection as $value) {
                        $_SESSION['userid'] = $value['id'];
                }
                header("Refresh:0");
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
                echo "Username is already taken!";
            }
        }
    }
    $render .= '</div>';
        return $render;
    }
    


?>