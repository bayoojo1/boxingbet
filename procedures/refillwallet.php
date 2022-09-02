<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$userId = $session->get('auth_user_id');

$users = new User();
$user = $users->findUserById($userId);
$user = json_decode($user, true);

$payment = new Payment();

if(isset($user[0]['mobile']) && !empty($user[0]['mobile'])) {
    $mobile = $user[0]['mobile'];
} else if(isset($user[0]['mymobile']) && !empty($user[0]['mymobile'])) {
    $mobile = $user[0]['mymobile'];
}

if(isset($user[0]['email']) && !empty($user[0]['email'])) {
    $email = $user[0]['email'];
} else if(isset($user[0]['myemail']) && !empty($user[0]['myemail'])) {
    $email = $user[0]['myemail'];
} else {
    $email = $mobile.'@dcolossus.com';
} 

$amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
//Multiply amount by 100
$amountPaid = $amount * 100;

//Create a random alphanumeric string to prevent payment failure on multiple attempt
$random = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 4)), 0, 4);

$reference = $userId.'-'.$amount.'-'.$random.'-'.'dColossus';

// Call the api function and pass required parameters
$result = $payment->paystack_api_refill($reference, $amountPaid, $email);
$arr = json_decode($result, true);
// Get all the needed variables to be used
$status = $arr['status'];

if($status !== true) {
    redirect('../invalidcode.php');
    exit;
}

$url = $arr['data']['authorization_url'];

if($status === true){
    redirect($url);
} else {
    redirect('../profile.php?u='.$userId);
}