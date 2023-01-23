<?php
    session_start();
print_r($_SESSION);
    include 'bootstrap.php';
    bootstrap();
    $home = Home();
    $gallery = gallery();
    $login = login();  
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
        <table>
        <td><a class="link"href="http://localhost/Sites/php/1php/01_function/?content=Home">Home</a></td>
        <td><a class="link"href="http://localhost/Sites/php/1php/01_function/?content=Gallery">Gallery</a></td>
        <td><a class="link"href="http://localhost/Sites/php/1php/01_function/?content=Login">Login</a></td>
        <td><a class="link"href="http://localhost/Sites/php/1php/01_function/?content=Niks">Niks</a></td>
        </table>
    </nav>

    <?php
        if (empty($_GET['content'])) {
            $_GET['content'] = 'Home';
        }
        echo 'je bent op de pagina ' . htmlspecialchars($_GET["content"])."<br>";
        if ($_GET['content'] == 'Home') {
            echo $home;
        }
        if($_GET['content'] == 'Gallery') {
            echo $gallery;
        }
        if ($_GET['content'] == 'Login') {
            echo $login;
        }
        print_r($_POST);

        
    ?>
    <script src="index.js"></script>
</body>

</html>