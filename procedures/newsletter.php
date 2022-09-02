<?php
require_once __DIR__ .'/../inc/bootstrap.php';

$users = new User();

if(isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    if($users->subscription($email)) {
        redirect('../newsletters.php');
    }
}