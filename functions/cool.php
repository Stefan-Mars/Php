<?php
function cool()
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
        $rend = "<textarea></textarea><br>";
        $rend .= "<button type='submit'>Post</button><br>";
        foreach ($collection as $value) {
            $rend .= "<table><tr>" . $value['Titel']."</tr>";
            $rend .= "<tr>" . $value['Tekst'] . "</tr></table>";
        }
    }
    else{
        $rend = "jij bent niet cool, want je bent niet ingelogd";
        
    }
    return $rend;
}
