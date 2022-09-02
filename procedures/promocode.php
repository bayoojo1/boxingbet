<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$data = json_decode(@file_get_contents("php://input"), true);

$boxerId = filter_var($data['boxerid'], FILTER_SANITIZE_STRING);
$discount = filter_var($data['discount'], FILTER_SANITIZE_STRING);

//Generate the promo code
$promoCode = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);

$payment = new Payment();
if($payment->setPromoCode($boxerId, $discount, $promoCode)) {
    echo 'success';
}