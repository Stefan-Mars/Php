<?php
    session_start();
    include 'bootstrap.php';
    bootstrap();
    if (empty($_GET['content'])) {
        $_GET['content'] = 'Home';
    }
    $content = call_user_func($_GET['content']);

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style><?php foreach (glob("*.css") as $filename){include $filename;}?></style>
    <title>Functions</title>
</head>

<body>
    <nav>
        <table class="navtb">
        <td class="navtd"><a class="link"href="index.php?content=Home">Home</a></td>
        <td class="navtd"><a class="link"href="index.php?content=Gallery">Gallery</a></td>
        <td class="navtd"><a class="link"href="index.php?content=Login">Login</a></td>
        <td class="navtd"><a class="link"href="index.php?content=cool">Cool</a></td>
        </table>
    </nav>

    <?php
        echo $content;
            $render = "<table>";
            $render .= "<tr><td style='text-align: center;' colspan='4'>Users</td></tr>";
            $render .= "<tr><td>Username</td><td>Password</td><td>ID</td><td>Profile</td></tr>";
        foreach($collection as $value)
        {
            $render .= "<tr><td>".$value['username']."</td>";
            $render .= "<td>".$value['password']."</td>";
            $render .= "<td>".$value['id']."</td>";
            $render .= "<td>".$value['profile']."</td>";
        }
        $render .= "</table>";
        echo $render;


        // if (mysqli_num_rows($result) > 0) {
        //     // output data of each row
        //     while($row = mysqli_fetch_assoc($result)) {
        //       echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
        //     }
        //   } else {
        //     echo "0 results";
        //   }
    ?>
    <script src="index.js"></script>
</body>

</html>