<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$reqAuth = new UserAuth();
$reqAuth->requireAuth();

if(isset($_POST['userid'])) {
    $userId = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_STRING);
}

$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);

if(isset($_POST['mymobile'])) {
    $mymobile = filter_var($_POST['mymobile'], FILTER_SANITIZE_STRING);
} else {
    $myemail = filter_var($_POST['myemail'], FILTER_SANITIZE_STRING);
}

// Update boxer info
$users = new User();

if(isset($mymobile)) {
    $users->updateUserInfo($fname, $lname, $mymobile, $myemail = null, $userId);
} else {
    $users->updateUserInfo($fname, $lname, $myemail, $mymobile = null, $userId);
}
redirect("../profile.php?u=$userId");

