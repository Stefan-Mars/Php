<?php
function Home()
{
    //Css in Website
    $filepath = "style.css";
    $file = fopen($filepath, "r") or die("Unable to open file!");
    $filecontent = fread($file, filesize($filepath));
    fclose($file);
        $homerend = '<div class="home">';
        $homerend .= '<h1>Welkom</h1>';
        $homerend .= 'Login en maak daarna een post';
        $homerend .= '<a href="https://rickjanssenic1e.nl">Rick janssen</a>';
        $homerend .= '</div>';
        return $homerend;
}
?>
