<?php
require_once __DIR__ . '/../inc/bootstrap.php';

$userId = $session->get('auth_user_id');

$bankname = filter_var($_POST['bankname'], FILTER_SANITIZE_STRING);
$bankaccount = filter_var($_POST['account'], FILTER_SANITIZE_STRING);
$amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);

$payment = new Payment();
$balance = $payment->getBalance($userId);
$balance = json_decode($balance, true);
$balance = $balance[0]['balance'];

// If requsted amount is more than wallet balance, deny the request 
if($amount > $balance) {
    redirect('../exceed.php');
    exit;
}

// If there is a pending withdraw request, inform user and stop new request
if($payment->checkWithdrawRequest($userId)) {
    redirect('../pending.php');
    exit;
}

// Update withdraw_request table
if($payment->updateWithdrawRequest($userId, $bankname, $bankaccount, $amount)) {
    redirect('../requested.php');
}