<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");


$data = json_decode(@file_get_contents("php://input"), true);

if(isset($data['email']) && !empty($data['email'])) {
    $email = $data['email'];
}
if(isset($data['mobile']) && !empty($data['mobile'])) {
    $mobile = $data['mobile'];
}
$password = $data['password'];

// Sanitize input
if(isset($email)) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
}
if(isset($mobile)) {
    $mobile = filter_var($mobile, FILTER_SANITIZE_STRING);
}

$password = filter_var($password, FILTER_SANITIZE_STRING);

$userExist = new User();

if(isset($email)) {
    $user = $userExist->findUserByEmail($email);
}
if(isset($mobile)) {
    $user = $userExist->findUserByMobile($mobile);
}
$user = json_decode($user, true);
//var_dump($user[0]['password']);


if(isset($user[0]['email']) && empty($user[0]['email'])) {
    echo 'not_found';
    exit;
}

if(isset($user[0]['mobile']) && empty($user[0]['mobile'])) {
    echo 'not_found';
    exit;
}

if(!password_verify($password, $user[0]['password'])) {
    echo 'invalid';
    exit;
}

$saveSession = new UserAuth();

$saveSession->saveUserSession($user);
echo 'success';

