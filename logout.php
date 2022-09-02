<?php
require_once __DIR__ . '/inc/bootstrap.php';

$session->remove('auth_logged_in');
$session->remove('auth_user_id');
$session->remove('auth_roles');

redirect('/boxingbet/index.php');