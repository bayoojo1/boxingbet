<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$userId = $session->get('auth_user_id');

$payment = new Payment();
$awards = new Awards();

if(isset($_POST['wallet'])) {
    $votePara = filter_var($_POST['votePara'], FILTER_SANITIZE_STRING);

    if($votePara == '') {
        redirect('../message.php');
        exit;
    }

    // Get required variables from votePara
    $totalVoteCost = explode('-', $votePara)[0];
    $nomineeId = explode('-', $votePara)[1];
    $voteCounts = explode('-', $votePara)[2];
    $catId = explode('-', $votePara)[3];

    // Insert into balance table
    $payment_type = 'vote';
    $payment->updateBalance($userId, -$totalVoteCost, $payment_type);

    // Insert into vote table 
    if($awards->updateVote($catId, $nomineeId, $voteCounts)) {
        redirect('../votemore.php');
    }
} else if(isset($_POST['paystack'])) {
    $votePara = filter_var($_POST['votePara'], FILTER_SANITIZE_STRING);

    if($votePara == '') {
        redirect('../message.php');
        exit;
    }

    // Get required variables from votePara
    $totalVoteCost = explode('-', $votePara)[0];
    $nomineeId = explode('-', $votePara)[1];
    $voteCounts = explode('-', $votePara)[2];
    $catId = explode('-', $votePara)[3];
    
    //Multiply price by 100
    $price = $totalVoteCost * 100;

    //Create a random alphanumeric string to prevent payment failure on multiple attempt
    $random = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 4)), 0, 4);
    
    // Create a sample email to be used 
    $email = 'example@dcolossus.com';
    
    //Create transanction reference
    $reference = $totalVoteCost.'-'.$voteCounts.'-'.$catId.'-'.$nomineeId.'-'.$random.'-'.'dColossus';
    
    // Call the api function and pass required parameters
    $result = $payment->paystack_api_vote($reference, $price, $email);
    $arr = json_decode($result, true);
    // Get all the needed variables to be used
    $status = $arr['status'];

    if($status !== true) {
        redirect('../message.php');
        exit;
    }

    $url = $arr['data']['authorization_url'];

    if($status === true){
        redirect($url);
    } else {
        redirect('../message.php');
    }   
}
?>