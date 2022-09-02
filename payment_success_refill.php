<?php
require_once __DIR__ . '/inc/bootstrap.php';

if(isset($_GET['trxref'])) {
    $trxref = filter_input(INPUT_GET, 'trxref', FILTER_SANITIZE_STRING);
    $reference = filter_input(INPUT_GET, 'reference', FILTER_SANITIZE_STRING);
}

// Call the verify api
$payment = new Payment();
$data = $payment->verifyApi($trxref);
$arr = json_decode($data, true);

// Get all the needed variables to be used
$status = $arr['status'];
$reference = $arr['data']['reference']; 

$userId = explode('-', $reference)[0];
$amount = explode('-', $reference)[1];
$paymentType = 'refill';

if($status === true) {
     //Update database
    $payment->updateBalance($userId, $amount, $paymentType);
} 
redirect('profile.php?u='.$userId);   
?>