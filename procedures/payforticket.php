<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$payment = new Payment();
$users = new User();
$contests = new Contest();

if(isset($_POST['identity']) && !empty($_POST['identity'])) {
    if(strpos($_POST['identity'], '@') !== false) {
        $email = $_POST['identity'];
    } else {
        $mobile = $_POST['identity'];
    } 
} else {
    //Get email/mobile from database
    $userId = $session->get('auth_user_id');
    $user = $users->findUserById($userId);
    $user = json_decode($user, true);
    if(isset($user[0]['email'])) {
        $email = $user[0]['email'];
    } else {
        $mobile = $user[0]['mobile'];
    }
}
//Get remaining variables
$receivedParams = filter_input(INPUT_POST, 'paymentdetails', FILTER_SANITIZE_STRING);
$promoCode = isset($_POST['code'])? $_POST['code'] : "";
$ticketType = explode('-', $receivedParams)[0];
$eventId = explode('-', $receivedParams)[1];
$price = explode('-', $receivedParams)[2];
$fightname = explode('-', $receivedParams)[3];
$fightname = str_replace(" ", "=", $fightname);

//Work with promo code if exist
if(isset($promoCode) && !empty($promoCode)) {
    $confirmPromo = $contests->getPromoCode($promoCode);
    $confirmPromo = json_decode($confirmPromo, true);
    if($confirmPromo[0]['code'] === $promoCode) {
        $percentage = $confirmPromo[0]['discount'] / 100;
        $pricePercentage = $price * $percentage;
        $price = $price - $pricePercentage;
    } else {
        redirect('../incorrectpromocode.php');
        exit;
    }
}

if(isset($email)) {
    $emailforRef = str_replace("@","=",$email);
    $realEmail = $email;
} else {
    $emailforRef = $mobile.'=dcolossus.com';
    $realEmail = $mobile.'@dcolossus.com';
}

$priceforRef = $price;
//Multiply price by 100
$price = $price * 100;

//Create a random alphanumeric string to prevent payment failure on multiple attempt
$random = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 4)), 0, 4);

//Create transanction reference
if(isset($promoCode) && !empty($promoCode)) {
    $reference = 'PROMO-'.$promoCode.'-'.$priceforRef.'-'.$eventId.'-'.$ticketType.'-'.$emailforRef.'-'.$fightname.'-'.$random.'-'.'dColossus';
} else {
    $reference = $priceforRef.'-'.$eventId.'-'.$ticketType.'-'.$emailforRef.'-'.$fightname.'-'.$random.'-'.'dColossus';
}

// Call the api function and pass required parameters
$result = $payment->paystack_api_ticket($reference, $price, $realEmail);
$arr = json_decode($result, true);
// Get all the needed variables to be used
$status = $arr['status'];

if($status !== true) {
    redirect('../ticketpurchase.php');
    exit;
}

$url = $arr['data']['authorization_url'];

if($status === true){
    redirect($url);
} else {
    redirect('../ticketpurchase.php');
}
?>