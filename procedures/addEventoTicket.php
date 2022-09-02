<?php
require_once __DIR__ . '/../inc/bootstrap.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");

$data = json_decode(@file_get_contents("php://input"), true);

$eventId = filter_var($data['eventId'], FILTER_SANITIZE_STRING);
$contestIds = filter_var_array($data['contestId'], FILTER_SANITIZE_STRING);
    
$contests = new Contest();

foreach($contestIds as $contestId) {
    $tickets = $contests->selectTicketsParams($eventId);
    $tickets = json_decode($tickets, true);
    
    // Get the tickets for each
    $fightname = $tickets[0]['fightname'];
    $regular = $tickets[0]['regular'];
    $vip = $tickets[0]['vip'];
    $vvip = $tickets[0]['vvip'];
    
    // Update the ticket database
    $contests->createEventTicket($eventId, $contestId, $fightname, $regular, $vip, $vvip);
}
echo 'success';