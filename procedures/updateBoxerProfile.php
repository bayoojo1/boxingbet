<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$userId = $session->get('auth_user_id');

$users = new User();
$user = $users->findUserById($userId);
$user = json_decode($user, true);




if(isset($user[0]['email']) && !empty($user[0]['email'])) {
    $email = $user[0]['email'];
}

if(isset($user[0]['mobile']) && !empty($user[0]['mobile'])) {
    $mobile = $user[0]['mobile'];
} 

$terms = filter_var($_POST['terms'], FILTER_SANITIZE_STRING);
$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
$alias = filter_var($_POST['alias'], FILTER_SANITIZE_STRING);
$aboutme = filter_var($_POST['aboutme'], FILTER_SANITIZE_STRING);
$weight = filter_var($_POST['weight'], FILTER_SANITIZE_STRING);
$height = filter_var($_POST['height'], FILTER_SANITIZE_STRING);
$stance = filter_var($_POST['stance'], FILTER_SANITIZE_STRING);
$clubName = filter_var($_POST['clubname'], FILTER_SANITIZE_STRING);
$coach = filter_var($_POST['coach'], FILTER_SANITIZE_STRING);
$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
$nation = filter_var($_POST['nationality'], FILTER_SANITIZE_STRING);
$age = filter_var($_POST['age'], FILTER_SANITIZE_STRING);
$sex = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);

    
//Set folder name from submitted identity
if(isset($email)) {
    $userFolder = explode('@', $email)[0];
} else {
    $userFolder = "$mobile";
}


if($terms !== 'on') {
    echo 'accept_terms';
    exit;
}
if($stance == '' || $sex == '') {
    echo 'all_fields';
    exit;
}
// Update boxer info
$users->updateBoxerInfo($fname, $lname, $alias, $aboutme, $weight, $height, $stance, $clubName, $coach, $state, $nation, $age, $sex, $userId);

if(isset($_FILES["photo"]["name"]) && !empty($_FILES["photo"]["name"])) {
    include_once __DIR__ .'/../inc/functions_postImage.php';
} else {
    echo $user[0]['userid'];
}
