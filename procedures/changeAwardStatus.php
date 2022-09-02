<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$data = json_decode(@file_get_contents("php://input"), true);

$currentStatus = filter_var($data['currentStatus'], FILTER_SANITIZE_STRING);
$awardId = filter_var($data['awardId'], FILTER_SANITIZE_STRING);

$awards = new Awards();

if($currentStatus === 'open') {
    $awards->closeAward($awardId, $status = 'closed');
    echo 'closed';
} else {
    $awards->openAward($awardId, $status = 'open');
    echo 'open';
}