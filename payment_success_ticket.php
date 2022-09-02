<?php
require_once __DIR__ . '/inc/bootstrap.php';

if(isset($_GET['trxref'])) {
    $trxref = filter_input(INPUT_GET, 'trxref', FILTER_SANITIZE_STRING);
    $reference = filter_input(INPUT_GET, 'reference', FILTER_SANITIZE_STRING);
}

$userId = isset($session->get('auth_user_id'))? $session->get('auth_user_id') : "";

// Call the verify api
$payment = new Payment();
$data = $payment->verifyApi($trxref);
$arr = json_decode($data, true);

// Get all the needed variables to be used
$status = $arr['status'];
$reference = $arr['data']['reference'];

//Generate ticket code
$eventPassCode = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);


if(explode('-', $reference)[0] === 'PROMO') {
    $promoCode = explode('-', $reference)[1];
    $price = explode('-', $reference)[2];
    $eventId = explode('-', $reference)[3];
    $ticketType = explode('-', $reference)[4];
    $email = explode('-', $reference)[5];
    $email = str_replace("=","@",$email);
    $fightname = explode('-', $reference)[6];
    $fightname = str_replace("=", " ", $fightname);
    //Check if user submitted a mobile instead of email
    if(is_numeric(explode('@', $email)[0])) {
        $mobile = explode('@', $email)[0];
    }
    if($status === true) {
        //Update database
        if(isset($mobile) && !empty($mobile)) {
            $payment->updatePaymentWPM($userId, $promoCode, $price, $eventId, $ticketType, $mobile, $fightname, $eventPassCode);
        } else {
           $payment->updatePaymentWPE($userId, $promoCode, $price, $eventId, $ticketType, $email, $fightname, $eventPassCode); 
        }
    }
    redirect("psuccess.php?pro=$promoCode&pri=$price&tt=$ticketType&fn=$fightname&epc=$eventPassCode&eid=$eventId");
    exit;
} else {
    $price = explode('-', $reference)[0];
    $eventId = explode('-', $reference)[1];
    $ticketType = explode('-', $reference)[2];
    $email = explode('-', $reference)[3];
    $email = str_replace("=","@",$email);
    $fightname = explode('-', $reference)[4];
    $fightname = str_replace("=", " ", $fightname);
    //Check if user submitted a mobile instead of email
    if(is_numeric(explode('@', $email)[0])) {
        $mobile = explode('@', $email)[0];
    }
    if($status === true) {
        //Update database
        if(isset($mobile) && !empty($mobile)) {
            $payment->updatePaymentWTPM($userId, $price, $eventId, $ticketType, $mobile, $fightname, $eventPassCode);
        } else {
           $payment->updatePaymentWTPE($userId, $price, $eventId, $ticketType, $email, $fightname, $eventPassCode); 
        }
    }
    redirect("psuccess.php?pri=$price&tt=$ticketType&fn=$fightname&epc=$eventPassCode&eid=$eventId");
}    
?>