<?php
session_start(); // Staring Session
$captchanumber = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz'; // Initializing PHP variable with string
$captchanumber = substr(str_shuffle($captchanumber), 0, 6); // Getting first 6 word after shuffle.
$_SESSION["code"] = $captchanumber; // Initializing session variable with above generated sub-string
$image = imagecreatefromjpeg("bg_1.jpeg"); // Generating CAPTCHA
$image = imagescale($image, 120, 40);
$foreground = imagecolorallocate($image, 175, 199, 200); // Font Color
imagestring($image, 20, 35, 10, $captchanumber, $foreground);
header('Content-Type: image/jpg');
imagejpeg($image);
?>