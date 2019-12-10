<?php

// Load the stamp and the photo to apply the watermark to

$stamp = imagecreatefrompng('img/watermark.png');
$im = imagecreatefrompng('img/gallery/9.png');

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);


$imgx = imagesx($im);
$imgy = imagesy($im);
$centerX=round($imgx/2);
$centerY=round($imgy/2);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 


imagecopy($im, $stamp, imagesx($im) - $sx, imagesy($im) - $sy, 0, 0, $sx, $sy);


// Output and free memory

imagepng($im,'img/4.png');
imagedestroy($im);	
?>



