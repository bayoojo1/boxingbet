<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$awards = new Awards();

if(isset($_POST['submit'])) {
    $endorserName = filter_var($_POST['endorser'], FILTER_SANITIZE_STRING);
    $endorserMobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
    $userId = isset($_POST['userid'])? $_POST['userid'] : "";
}
if(empty($endorserName) || empty($endorserMobile)) {
    redirect('../message.php?msg=empty');
    exit;
}
// Update boxer info
if(isset($userId) && !empty($userId)) {
    $awards->updateAwardEndorser($endorserName, $endorserMobile, $userId);
} else {
   $awards->createAwardEndorser($endorserName, $endorserMobile); 
}
// Redirect to presenter page
redirect('../allendorsers.php');