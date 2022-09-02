<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?><?php
if(isset($_GET['u'])) {
    $userId = filter_input(INPUT_GET, 'u', FILTER_SANITIZE_STRING);
}
$users = new User();
$user = $users->findUserById($userId);
$user = json_decode($user, true);

$contests = new Contest();

$userRoles = new UserAuth();

$payment = new Payment();

$awards = new Awards();

if($userRoles->isAdmin() && $userRoles->isOwner($userId)) { 
    $getcontests = $contests->getContest();
    $getcontests = json_decode($getcontests, true);
    $contests = new Contest();
    $limitedStakes = $contests->getLimitedStake();
    $limitedStakes = json_decode($limitedStakes, true);
    $contestLists = $contests->getStake();
    $contestLists = json_decode($contestLists, true);
    $allUsers = $users->getUser();
    $allUsers = json_decode($allUsers, true);
    $wins = $contests->getContestResult();
    $wins = json_decode($wins, true);
    $upcomings = $contests->getUpcomingContest();
    $upcomings = json_decode($upcomings, true);
    $limitboxers = $users->selectLimitedBoxers();
    $limitboxers = json_decode($limitboxers, true);
    $boxers = $users->selectBoxers();
    $boxers = json_decode($boxers, true);
    $withrawrequests = $payment->getWithrawRequest();
    $withrawrequests = json_decode($withrawrequests, true);
    $limitedCategories = $awards->getLimitedCategories();
    $limitedCategories = json_decode($limitedCategories, true);
    $nominees = $awards->getLimitedNominees();
    $nominees = json_decode($nominees, true);
    $sponsors = $awards->getLimitedSponsors();
    $sponsors = json_decode($sponsors, true);
    $presenters = $awards->getLimitedPresenters();
    $presenters = json_decode($presenters, true);
    $endorsers = $awards->getLimitedEndorsers();
    $endorsers = json_decode($endorsers, true);
    $limitedAwards = $awards->showLimitedAwards();
    $limitedAwards = json_decode($limitedAwards, true);
    $ticketspurchase = $payment->showLimitedTicketPurchase();
    $ticketspurchase = json_decode($ticketspurchase, true);
    include_once 'templates/admin.php'; 
} else { 
    $limitedStakes = $contests->getLimitedStake($userId);
    $limitedStakes = json_decode($limitedStakes, true);
    $wins = $contests->getContestResult($userId);
    $wins = json_decode($wins, true);
    $promocode = $payment->promoCode($userId);
    $promocode = json_decode($promocode, true);
    $wallet = $payment->getBalance($userId);
    $wallet = json_decode($wallet, true);
    $withrawrequests = $payment->getWithrawRequest($userId);
    $withrawrequests = json_decode($withrawrequests, true);
    $mywallettrans = $payment->showLimitedWalletTrans($userId);
    $mywallettrans = json_decode($mywallettrans, true);
    $myticketpurchases = $payment->showMyLimitedTicketPurchase($userId);
    $myticketpurchases = json_decode($myticketpurchases, true);
    include_once 'templates/user.php'; 
} 
?>

