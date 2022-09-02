<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$userId = $session->get('auth_user_id');

$payment = new Payment();
$contest = new Contest();

$users = new User();
$user = $users->findUserById($userId);
$user = json_decode($user, true);

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
$mystakes = unserialize($_POST['array']);
$arrLength = count($mystakes);
$stakeType = '';
//Extract possibility from mystake
foreach ($mystakes as $mystake) {
    $possibility = explode('-', $mystake)[0];
    $odd = explode('-', $mystake)[1];
    $contestId = explode('-', $mystake)[2];
    //Update stakes table
    if($arrLength > 1) {
        $contest->stake($userId, $contestId, $possibility, $odd, $amount, $stakeType = 'M');
    } else {
        $contest->stake($userId, $contestId, $possibility, $odd, $amount, $stakeType = 'S');
    }
    
}

//Multiply amount by 100
$amountUpdate = $amount * 100;

//Create a random alphanumeric string to prevent payment failure on multiple attempt
$random = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 4)), 0, 4);

// Get the submission date/time to be used in reference
$dateSubmitted = $contest->getDateOfSubmission($userId);
$dateSubmitted = json_decode($dateSubmitted, true);
$date = $dateSubmitted[0]['created_at'];
// Replace some characters in the date for reference
$date = str_replace("-", "=", $date);
$date = str_replace(":", ".", $date);
$date = str_replace(" ", "D", $date);

//Create transanction reference
$reference = $userId.'-'.$amount.'-'.$date.'-'.$random.'-'.'dColossus';

// Call the api function and pass required parameters
$result = $payment->paystack_api($reference, $amountUpdate, $email);
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
    redirect('../allstakes.php');
}
?>