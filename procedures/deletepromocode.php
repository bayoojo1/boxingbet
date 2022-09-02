<?php
require_once __DIR__ . '/../inc/bootstrap.php';

$boxerId = filter_var($_POST['boxerid'], FILTER_SANITIZE_STRING);

$payment = new Payment();
if($payment->deletePromoCode($boxerId)) {
    echo 'success';
}