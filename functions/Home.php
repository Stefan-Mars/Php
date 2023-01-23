<?php
function Home()
{
    //Css in Website
    $filepath = "style.css";
    $file = fopen($filepath, "r") or die("Unable to open file!");
    $filecontent = fread($file, filesize($filepath));
    fclose($file);
    
        $homerend = '<form action="" method="post">';
        $homerend .= '<input name="Antwoord1" placeholder="Getal 1"></input><br>';
        $homerend .= '<input name="Antwoord2" placeholder="Getal 2"></input>';
        $homerend .= '<button type="submit" id="submit">Submit</button>';
        $homerend .= '</form>';
        if (isset($_POST["Antwoord1"]) && isset($_POST["Antwoord2"])) {
            $antwoord = (int) $_POST["Antwoord1"] + (int) $_POST["Antwoord2"];
            $homerend .= "het antwoord is $antwoord";
        }
        $homerend .= '<br>';
        $homerend .= '<br>';
        $homerend .= 'Dit staat er in mijn CSS:<br>';
        $homerend .= '<code class="code">';
        $homerend .= $filecontent;
        $homerend .= '</code>';
        return $homerend;
}
?>