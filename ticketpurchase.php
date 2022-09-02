<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$userId = $session->get('auth_user_id');

$payment = new Payment();
$balance = $payment->getBalance($userId);
$balance = json_decode($balance, true);

if(isset($_POST['submit'])) {
    $ticketId = filter_input(INPUT_POST, 'ticket', FILTER_SANITIZE_STRING);
    //Get parameters 
    $ticketType = explode('-', $ticketId)[0];
    $eventId = explode('-', $ticketId)[1];
    $price = explode('-', $ticketId)[2];
    $fightname = explode('-', $ticketId)[3];
    
    include __DIR__ .'/templates/prepayment-one.php';
} else {
    include __DIR__ .'/templates/prepayment-two.php';
}
?>
 
<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/eventprice.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>

