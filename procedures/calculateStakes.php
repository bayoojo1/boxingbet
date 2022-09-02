<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$data = json_decode(@file_get_contents("php://input"), true);

$amount = filter_var($data['amount'], FILTER_SANITIZE_STRING);
$stakeIds = filter_var_array($data['stakeId'], FILTER_SANITIZE_STRING);

$addition = 0;
foreach($stakeIds as $stakeId) {
    $odd = explode('-', $stakeId)[1];
    $addition += $odd;
}
//Calculate the total win
if(is_numeric($addition)) {
    $totalWin = $addition * $amount;   

    if(count($stakeIds) > 1) {
        ;
        echo "For the ". count($stakeIds). " odds selected, and the amount being staked, your total win would be ".'&#8358;'.number_format((float)$totalWin, 2, '.', ','). " if all the odds win";
    } else {
        echo "For the odd selected, and the amount being staked, your win would be ".'&#8358;'.number_format((float)$totalWin, 2, '.', ',');
    }
}