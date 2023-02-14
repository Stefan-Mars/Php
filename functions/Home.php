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
        // $homerend .= '<table><form action="" method="post">';
        // $homerend .= '<tr><input name="Antwoord1" placeholder="Getal 1"></input></tr>';
        // $homerend .= '<tr><input name="Antwoord2" placeholder="Getal 2"></input></tr>';
        // $homerend .= '<tr><button type="submit" id="submit">Submit</button></tr>';
        // $homerend .= '</form></table>';
        // if (isset($_POST["Antwoord1"]) && isset($_POST["Antwoord2"])) {
        //     $antwoord = (int) $_POST["Antwoord1"] + (int) $_POST["Antwoord2"];
        //     $homerend .= "het antwoord is $antwoord";
        // }
        $homerend .= '<br>';
        $homerend .= '<br>';
        $homerend .= 'Dit staat er in mijn CSS:<br>';
        $homerend .= '<code class="code">';
        $homerend .= $filecontent;
        $homerend .= '</code>';
        $homerend .= '</div>';
        // $homerend .= gallery();
        return $homerend;
}
