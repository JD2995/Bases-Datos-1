<?php
$im = imagecreatefrompng("Imagenes\No_disponible.png");
    header('Content-Type: image/png');
    imagepng($im);
    imagedestroy($im);