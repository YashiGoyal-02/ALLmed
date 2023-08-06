<?php
// We start a session to access
// the captcha externally!
session_start();

// Generate a random number
// from 1000-9999
$captcha = rand(1000, 9999);

// The captcha will be stored
// for the session
$_SESSION["captcha"] = $captcha;

// Generate a 50x24 standard captcha image
$im = imagecreatetruecolor(80, 24);

// White color
$bg = imagecolorallocate($im, 255, 255, 255);

// Black color
$fg = imagecolorallocate($im, 0, 0, 0);

// Give the image a blue background
imagefill($im, 0, 0, $fg);

// Print the captcha text in the image
// with random position & size
imagestring($im, rand(1, 7), rand(1, 7),rand(1, 7), $captcha, $bg);

// The PHP-file will be rendered as image
header('Content-type: image/png');

// Finally output the captcha as
// PNG image the browser
imagepng($im);

// Free memory
imagedestroy($im);
?>