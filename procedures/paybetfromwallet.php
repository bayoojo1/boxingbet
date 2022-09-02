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

if(isset($user[0]['email']) && !empty($user[0]['email'])) {
    $email = $user[0]['email'];
} else if(isset($user[0]['myemail']) && !empty($user[0]['myemail'])) {
    $email = $user[0]['myemail'];
} else if(isset($user[0]['mobile']) && !empty($user[0]['mobile'])) {
    $mobile = $user[0]['mobile'];
}

$amount = filter_var($_POST['betamount'], FILTER_SANITIZE_STRING);
$mystakes = unserialize($_POST['betarray']);
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

// Get the submission date/time to be used in reference
$dateSubmitted = $contest->getDateOfSubmission($userId);
$dateSubmitted = json_decode($dateSubmitted, true);
$date = $dateSubmitted[0]['created_at'];

// Set stake as paid
$contest->updateStake($userId, $amount, $date);
// Update balance table
$payment->updateBalance($userId, -$amount, $paymentType = 'bet');

redirect('../allstakes.php');
?>