<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

$awards = new Awards();

if(isset($_POST['submit'])) {
    $nomineeName = filter_var($_POST['nominee'], FILTER_SANITIZE_STRING);
    $nomineeMobile = filter_var($_POST['mobile'], FILTER_SANITIZE_STRING);
    $userId = isset($_POST['userid'])? $_POST['userid'] : "";
}
if(empty($nomineeName) || empty($nomineeMobile)) {
    redirect('../message.php?msg=empty');
    exit;
}
// Update boxer info
if(isset($userId) && !empty($userId)) {
    $awards->updateAwardNominee($nomineeName, $nomineeMobile, $userId);
} else {
   $awards->createAwardNominee($nomineeName, $nomineeMobile); 
}

// Create an identity to be used while updating db with the image url
$identity = 'nominee';

if(isset($_FILES["photo"]["name"]) && !empty($_FILES["photo"]["name"])) {
    include_once __DIR__ .'/../inc/functions_awardPhotos.php';
} else {
    redirect('../allnominees.php');
}
