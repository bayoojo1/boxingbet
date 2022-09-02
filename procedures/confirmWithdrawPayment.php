<?php
require_once __DIR__ . '/../inc/bootstrap.php';

$requesterId = filter_var($_POST['requesterId'], FILTER_SANITIZE_STRING);
$amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
$paymentRef = filter_var($_POST['paymentRef'], FILTER_SANITIZE_STRING);

$userId = $session->get('auth_user_id');
$paymentType = 'withdrawal';

$payment = new Payment();
if($payment->confirmWithdrawReqPayment($requesterId, $amount, $paymentRef, $userId)) {
    $payment->updateBalance($requesterId, -$amount, $paymentType);
}