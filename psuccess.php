<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$contests = new Contest();

if(isset($_GET['pro']) && !empty($_GET['pro'])) {
    $promoCode = filter_input(INPUT_GET, 'pro', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_GET, 'pri', FILTER_SANITIZE_STRING);
    $ticketType = filter_input(INPUT_GET, 'tt', FILTER_SANITIZE_STRING);
    $fightname = filter_input(INPUT_GET, 'fn', FILTER_SANITIZE_STRING);
    $eventPassCode = filter_input(INPUT_GET, 'epc', FILTER_SANITIZE_STRING);
    $eventId = filter_input(INPUT_GET, 'eid', FILTER_SANITIZE_STRING);
    //Get more variables
    $eventDetail = $contests->getTicket($eventId);
    $eventDetail = json_decode($eventDetail, true);
    
    include __DIR__ .'/templates/paywithpromocode.php'; 
} else {
    $price = filter_input(INPUT_GET, 'pri', FILTER_SANITIZE_STRING);
    $ticketType = filter_input(INPUT_GET, 'tt', FILTER_SANITIZE_STRING);
    $fightname = filter_input(INPUT_GET, 'fn', FILTER_SANITIZE_STRING);
    $eventPassCode = filter_input(INPUT_GET, 'epc', FILTER_SANITIZE_STRING);
    $eventId = filter_input(INPUT_GET, 'eid', FILTER_SANITIZE_STRING);
    //Get more variables
    $eventDetail = $contests->getTicket($eventId);
    $eventDetail = json_decode($eventDetail, true);
    
    include __DIR__ .'/templates/paywithoutpromocode.php';
}

?>

<?php
include __DIR__ .'/templates/footer.php'; 
?>