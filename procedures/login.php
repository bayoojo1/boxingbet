<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");


$data = json_decode(@file_get_contents("php://input"), true);

if(isset($data['identity']) && !empty($data['identity'])) {
    if(strpos($data['identity'], '@') !== false) {
        $email = $data['identity'];
    } else {
        $mobile = $data['identity'];
    } 
}
$password = $data['password'];

// Sanitize input
if(isset($email) && !empty($email)) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
}
if(isset($mobile) && !empty($mobile)) {
    $mobile = filter_var($mobile, FILTER_SANITIZE_STRING);
}

$password = filter_var($password, FILTER_SANITIZE_STRING);

$userExist = new User();

if(isset($email) && !empty($email)) {
    $user = $userExist->findUserByEmail($email);
}
if(isset($mobile) && !empty($mobile)) {
    $user = $userExist->findUserByMobile($mobile);
}
$user = json_decode($user, true);


if(isset($user[0]['email']) && $user[0]['email'] !== $email) {
    echo trim('mailnotfound');
    exit;
} else if(isset($user[0]['mobile']) && $user[0]['mobile'] !== $mobile) {
    echo trim('mobilenotfound');
    exit;
} else if(!password_verify($password, $user[0]['password'])) {
    echo trim('invalid');
    exit;
} else if(isset($_SESSION["stake"]) && !empty($_SESSION["stake"])) {
    $saveSession = new UserAuth();
    $saveSession->saveUserSession($user);
    echo trim('redirect');
    exit;
} else {
    $saveSession = new UserAuth();
    $saveSession->saveUserSession($user);
    
    echo trim('success'); 
}