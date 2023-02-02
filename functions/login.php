<?php
function login()
{
    
    if (isset($_SESSION['status'])){
        $loginrend = '<form method= "post" action=""><input type="submit" id="loguit" name="loguit" value="Loguit"></form>';           
    }
    else{
        $loginrend = '<form method= "post" action=""><input name="username" placeholder="Username"></input><br>';
        $loginrend .= '<input name= "password" placeholder= "Password"></input><br>';
        $loginrend .= '<input type="submit" id= "submit" name="submit" value="login"></form>';
        $loginrend .= 'username = admin<br>ww = admin';
    }
    if (!empty($_POST['submit'])) {
        if (empty($_SESSION['status'])) {
            if (isset($_POST['password']) && isset($_POST["username"])) {
                if (($_POST['password'] == 'admin') && ($_POST["username"] == 'admin')) {
                    $_SESSION['status'] = true;
                    header("Refresh:0");

                }
            }
        }
        
        
    }
    if (!empty($_POST['loguit'])) {
        $_SESSION = [];
        header("Refresh:0");
    }


    return $loginrend;
    




    
}
