<?php
session_start();
include 'bootstrap.php';
bootstrap();
if (empty($_GET['content'])) {
    $_GET['content'] = 'Home';
}
$content = call_user_func($_GET['content']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Stefan,Mars,PHP">
    <meta name="description" content="PHP">
    <meta name= "author" content="Stefan Mars">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="refresh" content="60">
    <style>
        <?php foreach (glob("*.css") as $filename) {
            include $filename;
        } ?>
    </style>
    <title>Epische Site</title>
</head>

<body>
    <nav>
        <table class="navtb">
            <?php

            echo "<tr class='navtr'><td class='navtd'><a class='link' href='index.php?content=Home'>Home</a></td>";
            echo "<td class='navtd'><a class='link' href='index.php?content=posts'>Posts</a></td>";
            if (isset($_SESSION['status'])){
                echo "<td class='navtd'><a class='link' href='index.php?content=Login'>Ingelogd</a></td></tr>";
            }
            else{
                echo "<td class='navtd'><a class='link' href='index.php?content=Login'>Inloggen</a></td></tr>";
            }
            ?>
        </table>
    </nav>
    <div class='main'>
    <?php
        echo $content;
    ?>
    </div>
    <script type="text/javascript" src="index.js"></script>
</body>

</html>