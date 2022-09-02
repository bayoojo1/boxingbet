<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$data = json_decode(@file_get_contents("php://input"), true);

$odd = filter_var($data['odd'], FILTER_SANITIZE_STRING);
$contestId = filter_var($data['contestId'], FILTER_SANITIZE_STRING);

$contestInstance = new Contest();
$result = $contestInstance->getContestOdd($contestId, $odd);
$result = json_decode($result, true);
echo $result[0][$odd];