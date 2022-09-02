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
$confirmPwd = $data['confirmPass'];
$terms = $data['terms'];

// Sanitize input
if(isset($email)) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
}
if(isset($mobile)) {
   $mobile = filter_var($mobile, FILTER_SANITIZE_STRING); 
}
$password = filter_var($password, FILTER_SANITIZE_STRING);
$confirmPwd = filter_var($confirmPwd, FILTER_SANITIZE_STRING);
$terms = filter_var($terms, FILTER_SANITIZE_STRING);

$userExist = new User();

if(isset($email)) {
    $user = $userExist->findUserByEmail($email);
} else {
    $user = $userExist->findUserByMobile($mobile);
}


$user = json_decode($user, true);
//var_dump($user[0]['password']);

if(!empty($user[0]['email'])) {
    echo 'user_exist';
    exit;
}
if(!empty($user[0]['mobile'])) {
    echo 'user_exist';
    exit;
}
if(strlen($password) < 8) {
    echo 'pwd_too_short';
    exit;
}
if($password != $confirmPwd) {
  echo 'not_match';
  exit;
}
if($terms != 'Y') {
  echo 'accept_terms';
  exit;
}

if(isset($email)) {
    $email = strtolower($email);
}
$hashed = password_hash($password, PASSWORD_DEFAULT);

$newUser = new User();
$userId = $newUser->createUniqueId();

if(isset($mobile)) {
    $user = $newUser->createUserMobile($mobile, $userId, $hashed);
} else {
    $user = $newUser->createUserEmail($email, $userId, $hashed);
}
$user = json_decode($user, true);

$saveSession = new UserAuth();
$saveSession->saveUserSession($user);

//Create user folder
if(isset($email)) {
    $userFolder = explode('@', $email)[0];
} else {
    $userFolder = "$mobile";
}


//Create directory(folder) to hold each user's pics.
if (!file_exists("../users/$userFolder")) {
mkdir("../users/$userFolder", 0755);
}
echo $user[0]['userid'];