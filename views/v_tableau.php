<?php

$im = imagecreate(100, 100);

// Fixe le fond rouge
$red = imagecolorallocate($im, 255, 0, 0);
$grey = imagecolorallocate($im, 0, 255, 0);
$black = imagecolorallocate($im, 0, 0, 255);
// imagesetstyle($im, $grey);
imagefill($im, 0, 0, $red);
// Le texte à dessiner
// $text = 'Test...';
// // Remplacez le chemin par votre propre chemin de police
// $font = '';

// Ajout d'ombres au texte
// imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Ajout du texte
// imagettftext($im, 20, 0, 10, 20, $black, 'arial', $text);

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);

// // Création d'un gestionnaire d'image, puis définit la couleur d'arrière-plan
// // à blanc
// $im = imagecreatetruecolor(100, 100);
// imagefilledrectangle($im, 0, 0, 100, 100, imagecolorallocate($im, 255, 255, 255));

// // Dessine une ellipse dont les bordures seront noires
// imageellipse($im, 50, 50, 50, 50, imagecolorallocate($im, 0, 0, 0));

// // Définit la bordure et remplit l'ellipse de la couleur choisie
// $border = imagecolorallocate($im, 0, 0, 0);
// $fill = imagecolorallocate($im, 255, 0, 0);

// // Remplit la sélection
// imagefilltoborder($im, 50, 50, $border, $fill);

// // Affichage et libération de la mémoire
// header('Content-type: image/png');
// imagepng($im);
// imagedestroy($im);

// // Création d'une image truecolor
// $im = imagecreatetruecolor(100, 100);

// // Conversion en palette de 255 couleurs
// imagetruecolortopalette($im, false, 255);

// // Sauvegarde de l'image
// imagepng($im, './paletteimage.png');
// imagedestroy($im);
// header("Content-type: image/jpeg");
// $im  = imagecreate(100, 100);
// $w   = imagecolorallocate($im, 255, 255, 255);
// $red = imagecolorallocate($im, 255, 0, 0);

// /* Dessine une ligne pointillée de 5 pixels rouges, 5 pixels blancs */
// $style = array($red, $red, $w, $w);
// imagesetstyle($im, $style);
// imageline($im, 0, 0, 100, 100, IMG_COLOR_STYLED);

/* Dessine une ligne avec des smileys, en utilisant imagesetbrush() et imagesetstyle */
// $style = array($w, $w, $w, $red);
// imagesetstyle($im, $style);

// $brush = imagecreatefrompng("http://www.libpng.org/pub/png/images/smile.happy.png");
// $w2 = imagecolorallocate($brush, 255, 255, 255);
// imagecolortransparent($brush, $w2);
// imagesetbrush($im, $brush);
// imageline($im, 100, 0, 0, 100, IMG_COLOR_STYLEDBRUSHED);

// imagejpeg($im);
// imagedestroy($im);
?>
<!-- <body style="background: yellow;" >bode</body> -->