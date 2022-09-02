<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$awards = new Awards();

if(isset($_POST['submit'])) {
    $sponsorName = filter_var($_POST['sponsor'], FILTER_SANITIZE_STRING);
    $sponsorMobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
    //$userId = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);
    $userId = isset($_POST['userid'])? $_POST['userid'] : "";
}
if(empty($sponsorName) || empty($sponsorMobile)) {
    redirect('../message.php?msg=empty');
    exit;
}
// Update boxer info
if(isset($userId) && !empty($userId)) {
    $awards->updateAwardSponsor($sponsorName, $sponsorMobile, $userId);
} else {
   $awards->createAwardSponsor($sponsorName, $sponsorMobile); 
}
// Create an identity to be used while updating db with the image url
$identity = 'sponsor';

if(isset($_FILES["photo"]["name"]) && !empty($_FILES["photo"]["name"])) {
    include_once __DIR__ .'/../inc/functions_awardPhotos.php';
} else {
    redirect('../allsponsors.php');
}
