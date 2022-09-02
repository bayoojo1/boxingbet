<?php
require_once __DIR__ . '/inc/bootstrap.php';

$userId = $session->get('auth_user_id');

if(isset($_GET['trxref'])) {
    $trxref = filter_input(INPUT_GET, 'trxref', FILTER_SANITIZE_STRING);
    $reference = filter_input(INPUT_GET, 'reference', FILTER_SANITIZE_STRING);
}

$payment = new Payment();
$awards = new Awards();

// Call the verify api
$data = $payment->verifyApi($trxref);
$arr = json_decode($data, true);

// Get all the needed variables to be used
$status = $arr['status'];
$reference = $arr['data']['reference'];

// Get parameters from the reference
$totalVoteCost = explode('-', $reference)[0];
$voteCounts = explode('-', $reference)[1];
$catId = explode('-', $reference)[2];
$nomineeId = explode('-', $reference)[3];

// Set payment type
$paymentType = 'vote';

if($status === true) {
     //Insert into balance table
    if(isset($userId)) {
        $payment->updateBalance($userId, -$totalVoteCost, $paymentType);  
    } else {
        $payment->updateBalance($userId = 'notlogin', -$totalVoteCost, $paymentType);
    }
    // Insert into vote table 
    if($awards->updateVote($catId, $nomineeId, $voteCounts)) {
        redirect('votemore.php');
    }
}  
?>