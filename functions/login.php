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
    if (!isset($_POST['register'])) {
    $render = '<div class="login">';
    if (isset($_SESSION['status'])) {
        $render .= '<form method= "post" action=""><input type="submit" id="loguit" name="loguit" value="Loguit"></form><br>';
    } else {
        $render .= '<h2>Login</h2>';
        $render .= '<table><tr><form method= "post" action=""><input name="username" placeholder="Username"></input></tr>';
        $render .= '<tr><input type="password"name= "password" placeholder= "Password" required></input></tr>';
        $render .= '<tr><input type="submit" id= "submit" name="submit" value="Login" required></form></tr></table>';
        $render .= '<form method= "post" action=""><button id="rbutton"name="register"> Heb je geen account?</button></table>';
    }
    if (!empty($_POST['submit'])) {
        if (empty($_SESSION['status'])) {
            if (isset($_POST['password']) && isset($_POST["username"])) {
                foreach ($collection as $value) {
                    if (($_POST['password'] == $value['password']) && ($_POST["username"] == $value['username'])) {
                        $_SESSION['status'] = true;
                        header("Refresh:0");
                    }
                }
            }
        }
    }
    
    if (!empty($_POST['loguit'])) {
        $_SESSION = [];
        header("Refresh:0");
    }
}
    if (isset($_SESSION['status'])) {
        $render .= "<table class='border'>";
        $render .= "<tr><td>ID</td><td>Username</td><td>Password</td><td>Profile</td></tr>";
        foreach ($collection as $value) {
            $render .= "<tr><td class='info'>" . $value['id'] . "</td>";
            $render .= "<td class='info'>" . $value['username'] . "</td>";
            $render .= "<td class='info'>" . $value['password'] . "</td>";
            $render .= "<td class='info'>" . $value['profile'] . "</td>";
        }
        $render .= "</table>";
    }
    else{
        if (isset($_POST['register'])) {
            $render .= "<h2>Create Account</h2>";
            $render .= "<table><form method= 'post' action='' >";
            $render .= '<tr><input name= "createUsername" placeholder= "Username" required></input></tr>';
            $render .= '<tr><input type="password" name= "createPassword" placeholder= "Password" required></input></tr>';
            $render .= '<tr><input type="submit" id= "submit" name="submit" value="Create" required></tr>';
            $render .= "</form></table>";
        }
    }
    if (!empty($_POST['createUsername']) && !empty($_POST["createPassword"])) {
        if (isset($_POST['createUsername']) && isset($_POST["createPassword"])) {
            $createUsername = $_POST['createUsername'];
            $createPassword = $_POST['createPassword'];
            $sql = "INSERT INTO users (id, username, password, profile)
            VALUES ('', '$createUsername', '$createPassword','1')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['status'] = true;
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
