<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$data = json_decode(@file_get_contents("php://input"), true);

$fightname = filter_var($data['fightname'], FILTER_SANITIZE_STRING);
$regular = filter_var($data['regular'], FILTER_SANITIZE_STRING);
$vip = filter_var($data['vip'], FILTER_SANITIZE_STRING);
$vvip = filter_var($data['vvip'], FILTER_SANITIZE_STRING);
$contestIds = filter_var_array($data['contestId'], FILTER_SANITIZE_STRING);

//Create eventId
$unique = new User();
$eventId = $unique->createUniqueId();

$contests = new Contest();

foreach($contestIds as $contestId) {
    $contests->createEventTicket($eventId, $contestId, $fightname, $regular, $vip, $vvip);
}
echo 'success';