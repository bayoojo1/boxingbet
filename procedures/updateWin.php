<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$payment = new Payment(); 

$data = json_decode(@file_get_contents("php://input"), true);

$contestId = filter_var($data['contestId'], FILTER_SANITIZE_STRING);
$odd = filter_var($data['odd'], FILTER_SANITIZE_STRING);

$contestInstance = new Contest();
if($contestInstance->updateWin($contestId, $odd)) {
    //Update the balance table with the winners detail.
    $winningpossibilities = $contestInstance->getPossibility($contestId, $odd);
    $winningpossibilities = json_decode($winningpossibilities, true);
    foreach($winningpossibilities as $possibility) {
        foreach($possibility as $key => $value) {
            //Calculate the amount winned
            $paymentType = 'bet';
            $amount = $value['odd'] * $value['stake'];
            //Update wallet
            $payment->updateBalance($value['userid'], $amount, $paymentType);
        }
    }
    echo 'success';
}