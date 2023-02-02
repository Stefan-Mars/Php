<?php
function gallery(){
    //Plaatjes in Website
        $galleryrend = "<button onclick='klik()'>Klik voor Plaatjes</button><br>";
        $galleryrend .= '<div class="hidden" class="container" id="iets">';

        $images = glob("GALLERY/*.{jpg,jpeg,gif,png,bmp,webp}", GLOB_BRACE);
        foreach ($images as $i) {
        $galleryrend .= "<img src='gallery/" . rawurlencode(basename($i)) . "'>";
        }
        $galleryrend .= '</div>';
        return $galleryrend;
}