<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");


$data = json_decode(@file_get_contents("php://input"), true);

if(isset($data['identity']) && !empty($data['identity'])) {
    if(strpos($data['identity'], '@') !== false) {
        $email = filter_var($data['identity'], FILTER_SANITIZE_EMAIL);
    } else {
        $mobile = filter_var($data['identity'], FILTER_SANITIZE_STRING); 
    } 
}
$password = $data['password'];
$confirmPwd = $data['confirmPass'];
$fname = filter_var($data['fname'], FILTER_SANITIZE_STRING);
$lname = filter_var($data['lname'], FILTER_SANITIZE_STRING);
$alias = filter_var($data['alias'], FILTER_SANITIZE_STRING);
$aboutme = filter_var($data['aboutme'], FILTER_SANITIZE_STRING);
$weight = filter_var($data['weight'], FILTER_SANITIZE_STRING);
$height = filter_var($data['height'], FILTER_SANITIZE_STRING);
$stance = filter_var($data['stance'], FILTER_SANITIZE_STRING);
$clubName = filter_var($data['clubname'], FILTER_SANITIZE_STRING);
$coach = filter_var($data['coach'], FILTER_SANITIZE_STRING);
$state = filter_var($data['state'], FILTER_SANITIZE_STRING);
$nation = filter_var($data['nationality'], FILTER_SANITIZE_STRING);
$age = filter_var($data['age'], FILTER_SANITIZE_STRING);
$terms = filter_var($data['terms'], FILTER_SANITIZE_STRING);
$sex = filter_var($data['sex'], FILTER_SANITIZE_STRING);

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
    $user = $newUser->createBoxerMobile($mobile, $fname, $lname, $alias, $aboutme, $weight, $height, $stance, $clubName, $coach, $state, $nation, $age, $sex, $userId, $hashed);
} else {
    $user = $newUser->createBoxerEmail($email, $fname, $lname, $alias, $aboutme, $weight, $height, $stance, $clubName, $coach, $state, $nation, $age, $sex, $userId, $hashed);
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