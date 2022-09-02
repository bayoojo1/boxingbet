<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");


$data = json_decode(@file_get_contents("php://input"), true);

$email = $data['email'];

// Sanitize email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  echo("$email is not a valid email address");
} else {
    $portal = new User();
   
    $output = $portal->getUser($email);

    echo $output;
}

