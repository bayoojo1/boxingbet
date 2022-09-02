<?php
require_once __DIR__ .'/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?><?php
$userId = $session->get('auth_user_id');

if(isset($_POST['submit'])) {
    $nominee = filter_var($_POST['nominee'], FILTER_SANITIZE_STRING);
    $voteCounts = filter_var($_POST['qty'], FILTER_SANITIZE_STRING);
    $sponsorImg = filter_var($_POST['sponsorImg'], FILTER_SANITIZE_STRING);
    $catId = filter_var($_POST['catId'], FILTER_SANITIZE_STRING);
}
if($nominee == '' || $voteCounts == '' || $sponsorImg == '' || $catId == '') {
    echo 'empty';
    redirect('message.php');
}

// Get nominee name
$awards = new Awards();
$nomineeName = $awards->getNomineeName($nominee);
$nomineeName = json_decode($nomineeName, true);
$nomineeName = $nomineeName[0]['name'];

// Run check on the submitted number of votes
if($voteCounts < 5) {
    $voteCounts = 5;
}
$totalVoteCost = $voteCounts * 100;


$payment = new Payment();
$balance = $payment->getBalance($userId);
$balance = json_decode($balance, true);

if(isset($userId) && ($balance[0]['balance'] > $totalVoteCost)) {
    include __DIR__ .'/templates/paywithwallet.php';  
} else {
    include __DIR__ .'/templates/paywithpaystack.php'; 
}

?>

<?php
include __DIR__ .'/templates/footer.php'; 
?>