<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$awards = new Awards();

if(isset($_POST['submit'])) {
    $presenterName = filter_var($_POST['presenter'], FILTER_SANITIZE_STRING);
    $presenterMobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
    $userId = isset($_POST['userid'])? $_POST['userid'] : "";
}
if(empty($presenterName) || empty($presenterMobile)) {
    redirect('../message.php?msg=empty');
    exit;
}
// Update boxer info
if(isset($userId) && !empty($userId)) {
    $awards->updateAwardPresenter($presenterName, $presenterMobile, $userId);
} else {
   $awards->createAwardPresenter($presenterName, $presenterMobile); 
}
// Redirect to presenter page
redirect('../allpresenters.php');