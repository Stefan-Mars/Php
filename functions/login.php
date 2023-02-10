<?php
function login()
{
    $conn = mysqli_connect('localhost', 'root', '', 'php');
    if(!$conn){
        die('Connection Failed' . mysqli_connect_error());
    }

    $result = mysqli_query($conn, 'SELECT * FROM `users`');

    $collection = [];
    if(mysqli_num_rows($result) > 0);{
        while($row=mysqli_fetch_assoc($result))
        {
            $collection[]=$row;
        }
    }





    if (isset($_SESSION['status'])){
        $loginrend = '<form method= "post" action=""><input type="submit" id="loguit" name="loguit" value="Loguit"></form>';           
    }
    else{
        $loginrend = '<form method= "post" action=""><input name="username" placeholder="Username"></input><br>';
        $loginrend .= '<input name= "password" placeholder= "Password"></input><br>';
        $loginrend .= '<input type="submit" id= "submit" name="submit" value="login"></form>';
    }
    if (!empty($_POST['submit'])) {
        if (empty($_SESSION['status'])) {
            if (isset($_POST['password']) && isset($_POST["username"])) {
                foreach($collection as $value){
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


    return $loginrend;
    




    
}
