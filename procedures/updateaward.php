<?php
require_once __DIR__ . '/../inc/bootstrap.php';

$awardId = filter_var($_POST['awardId'], FILTER_SANITIZE_STRING);
$category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
$nominee1 = filter_var($_POST['nominee1'], FILTER_SANITIZE_STRING);
$nominee2 = isset($_POST['nominee2'])? filter_var($_POST['nominee2'], FILTER_SANITIZE_STRING) : ""; 
$nominee3 = isset($_POST['nominee3'])? filter_var($_POST['nominee3'], FILTER_SANITIZE_STRING) : ""; 
$nominee4 = isset($_POST['nominee4'])? filter_var($_POST['nominee4'], FILTER_SANITIZE_STRING) : "";
$nominee5 = isset($_POST['nominee5'])? filter_var($_POST['nominee5'], FILTER_SANITIZE_STRING) : "";
$sponsor = isset($_POST['sponsor'])? filter_var($_POST['sponsor'], FILTER_SANITIZE_STRING) : ""; 
$presenter = isset($_POST['presenter'])? filter_var($_POST['presenter'], FILTER_SANITIZE_STRING) : ""; 
$endorser = isset($_POST['endorser'])? filter_var($_POST['endorser'], FILTER_SANITIZE_STRING) : ""; 

$awards = new Awards();
if($awards->updateAward($awardId, $category, $nominee1, $nominee2, $nominee3, $nominee4, $nominee5, $sponsor, $presenter, $endorser)) {
    redirect('../allawards.php');
}