<?php
function login()
{
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
    if (isset($_SESSION['status'])) {
        $render .= '<br><form method= "post" action=""><button type="submit" id="loguit" value="loguit" name="loguit">Loguit</button></form><br>';
    } else {
        $render .= '<h2>Login</h2>';
        $render .= '<table><tr><form method= "post" action=""><input name="username" placeholder="Username"></input></tr>';
        $render .= '<tr><input type="password"name= "password" placeholder= "Password" required></input></tr>';
        $render .= '<tr><button style="margin-top: 3px;" type="submit" id= "submit" name="submit" value="Login" required>Login</button></form></tr></table>';
        $render .= '<a href="index.php?content=register" id="rbutton"> Heb je geen account?</a><br></div>';
    }
    if (!empty($_POST['submit'])) {
        if (empty($_SESSION['status'])) {
            if (isset($_POST['password']) && isset($_POST["username"])) {
                foreach ($collection as $value) {
                    if ((md5($_POST['password']) == $value['password']) && ($_POST["username"] == $value['username'])) {
                        $_SESSION['status'] = true;
                        $_SESSION['ingelogde'] = $value['username'];
                        $_SESSION['userid'] = $value['id'];
                        header("Location: https://stefanmars.nl/index.php?content=Home");
                    }
                }
            }
        }
    }
    
    if (!empty($_POST['loguit'])) {
        $_SESSION = [];
        header("Refresh:0");
    }
    // if (isset($_SESSION['status'])) {
    //     $render .= "<table class='border'>";
    //     $render .= "<tr><td>ID</td><td>Username</td><td>Password</td><td>Profile</td></tr>";
    //     foreach ($collection as $value) {
    //         $render .= "<tr><td class='info'>" . $value['id'] . "</td>";
    //         $render .= "<td class='info'>" . $value['username'] . "</td>";
    //         $render .= "<td class='info'>" . $value['password'] . "</td>";
    //         $render .= "<td class='info'>" . $value['profile'] . "</td></tr>";
    //     }
    //     $render .= "</table>";
    // }
    return $render;
}
?>