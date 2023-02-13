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
    <style>
        <?php foreach (glob("*.css") as $filename) {
            include $filename;
        } ?>
    </style>
    <title>Functions</title>
</head>

<body>
    <nav>
        <table class="navtb">
            <td class="navtd"><a class="link" href="index.php?content=Home">Home</a></td>
            <td class="navtd"><a class="link" href="index.php?content=Gallery">Gallery</a></td>
            <td class="navtd"><a class="link" href="index.php?content=Login">Login</a></td>
            <td class="navtd"><a class="link" href="index.php?content=cool">Cool</a></td>
        </table>
    </nav>

    <?php
    echo $content;
    ?>
    <script src="index.js"></script>
</body>

</html>