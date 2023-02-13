<?php
function login()
{
    $conn = mysqli_connect('localhost', 'root', '', 'php');
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
        $render .= '<form method= "post" action=""><input type="submit" id="loguit" name="loguit" value="Loguit"></form>';
    } else {
        $render .= '<h2>Login</h2>';
        $render .= '<table><tr><form method= "post" action=""><input name="username" placeholder="Username"></input></tr>';
        $render .= '<tr><input name= "password" placeholder= "Password"></input></tr>';
        $render .= '<tr><input type="submit" id= "submit" name="submit" value="login"></form></tr></table>';
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
    $render .= "<h2>Create Account</h2>";
    $render .= "<table><form method= 'post' action='' >";
    $render .= '<tr><input name= "createUsername" placeholder= "Username"></input></tr>';
    $render .= '<tr><input name= "createPassword" placeholder= "Password"></input></tr>';
    $render .= '<tr><input type="submit" id= "submit" name="submit"></tr>';
    $render .= "</form></table>";
    $render .= "<table>";
    $render .= "<tr><td style='text-align: center;' colspan='4'>Users</td></tr>";
    $render .= "<tr><td>ID</td><td>Username</td><td>Password</td><td>Profile</td></tr>";
    foreach ($collection as $value) {
        $render .= "<tr><td>" . $value['id'] . "</td>";
        $render .= "<td>" . $value['username'] . "</td>";
        $render .= "<td>" . $value['password'] . "</td>";
        $render .= "<td>" . $value['profile'] . "</td>";
    }
    $render .= "</table>";
    if (!empty($_POST['createUsername']) && !empty($_POST["createPassword"])) {
        if (isset($_POST['createUsername']) && isset($_POST["createPassword"])) {
            $createUsername = $_POST['createUsername'];
            $createPassword = $_POST['createPassword'];
            $sql = "INSERT INTO users (id, username, password, profile)
        VALUES ('', '$createUsername', '$createPassword','1')";
            if ($conn->query($sql) === TRUE) {
                echo "New Account created successfully";
                $_SESSION['status'] = true;
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    $render .= '</div>';
    return $render;
}
