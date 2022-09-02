<?php
require_once __DIR__ . '/inc/bootstrap.php';

$user = new User();

if(isset($_POST['captcha']) && ($_SESSION["code"] === $_POST["captcha"])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $msg = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);


    if($user->saveMessages($msg, $name, $email, $subject)) {
        // Redirect to thank you page
        redirect('thankyou.php');
        exit;
    }
} else {
    redirect('error.php');
}
?>