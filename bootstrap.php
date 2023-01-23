<?php
function bootstrap()
{
    foreach (glob("functions/*.php") as $filename) {
        include $filename;
    }
}
?>