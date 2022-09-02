<?php
require_once __DIR__ . '/inc/bootstrap.php';

$payment = new Payment();
$contests = new Contest();
$users = new User();

$userId = $session->get('auth_user_id');
$user = $users->findUserById($userId);
$user = json_decode($user, true);

if(isset($user[0]['email']) && !empty($user[0]['email'])) {
    $email = $user[0]['email'];
} else if(isset($user[0]['myemail']) && !empty($user[0]['myemail'])) {
    $email = $user[0]['myemail'];
} else if(isset($user[0]['mobile']) && !empty($user[0]['mobile'])) {
    $mobile = $user[0]['mobile'];
} else if(isset($user[0]['mymobile']) && !empty($user[0]['mymobile'])) {
    $mobile = $user[0]['mymobile'];
}

//Generate ticket code
$eventPassCode = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);
$receivedParams = filter_input(INPUT_POST, 'parameters', FILTER_SANITIZE_STRING);
$ticketType = explode('-', $receivedParams)[0];
$eventId = explode('-', $receivedParams)[1];
$price = explode('-', $receivedParams)[2];
$fightname = explode('-', $receivedParams)[3];

if(isset($_POST['pcode']) && !empty($_POST['pcode'])) {
    //Get remaining variables
    $promoCode = $_POST['pcode'];
    
    //Work with promo code if exist
    if(isset($promoCode) && !empty($promoCode)) {
        $confirmPromo = $contests->getPromoCode($promoCode);
        $confirmPromo = json_decode($confirmPromo, true);
        if($confirmPromo[0]['code'] === $promoCode) {
            $percentage = $confirmPromo[0]['discount'] / 100;
            $pricePercentage = $price * $percentage;
            $price = $price - $pricePercentage;
        } else {
            redirect('incorrectpromocode.php');
            exit;
        }
    }
   
    //Update database
    if(isset($mobile) && !empty($mobile)) {
        $payment->updatePaymentWPM($userId, $promoCode, $price, $eventId, $ticketType, $mobile, $fightname, $eventPassCode);
    } else {
       $payment->updatePaymentWPE($userId, $promoCode, $price, $eventId, $ticketType, $email, $fightname, $eventPassCode);  
    }
    // Update balance table
    $payment->updateBalance($userId, -$price, $paymentType = 'ticket');
    
    redirect("psuccess.php?pro=$promoCode&pri=$price&tt=$ticketType&fn=$fightname&epc=$eventPassCode&eid=$eventId");
    exit;
} else {
    //Update database
    if(isset($mobile) && !empty($mobile)) {
        $payment->updatePaymentWTPM($userId, $price, $eventId, $ticketType, $mobile, $fightname, $eventPassCode);
    } else {
       $payment->updatePaymentWTPE($userId, $price, $eventId, $ticketType, $email, $fightname, $eventPassCode); 
    }
    // Update balance table
    $payment->updateBalance($userId, -$price, $paymentType = 'ticket');
    redirect("psuccess.php?pri=$price&tt=$ticketType&fn=$fightname&epc=$eventPassCode&eid=$eventId");
}   