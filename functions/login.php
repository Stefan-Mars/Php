<?php
function login()
{
    $loginrend = '<form method= "post" action=""><input name="username" placeholder="Username"></input><br>';
    $loginrend .= '<input name= "password" placeholder= "Password"></input><br></form>';
    $loginrend .= '<form action="" method="post"><input type="submit" id= "submit" name="submit" value="login"></form>';

    if (!isset($_SESSION['status'])) {
        $_SESSION['status'] == 'Uitgelogd';
    }
    if ($_POST['submit']) {
        if ($_SESSION['status'] == 'Uitgelogd') {
            if (isset($_POST['password']) && isset($_POST["username"])) {
                if (($_POST['password'] == 'admin') && ($_POST["username"] == 'admin')) {
                    $_SESSION['status'] == 'Ingelogd';
                }
            }
        }
        
        
    }
    $loginrend .= $_SESSION['status'];
    return $loginrend;




    
}
