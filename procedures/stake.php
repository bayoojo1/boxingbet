<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$data = json_decode(@file_get_contents("php://input"), true);

$userId = filter_var($data['userid'], FILTER_SANITIZE_STRING);
$contestId = filter_var($data['contestid'], FILTER_SANITIZE_STRING);
$possibility = filter_var($data['possibility'], FILTER_SANITIZE_STRING);
$odd = filter_var($data['odd'], FILTER_SANITIZE_STRING);
$stake = filter_var($data['stake'], FILTER_SANITIZE_STRING);

$contestInstance = new Contest();
if($contestInstance->stake($userId, $contestId, $possibility, $odd, $stake)) {
    echo 'success';
}