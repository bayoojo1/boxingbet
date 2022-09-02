<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

if(isset($_POST['submit'])) {
    $clickedIds = filter_input(INPUT_POST, 'clickedId', FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);
} else {
    $amount = !empty($_SESSION['stake'][0]['amount'])? $_SESSION['stake'][0]['amount'] : "";
    $clickedIds = !empty($_SESSION['stake'][0]['selections'])? $_SESSION['stake'][0]['selections'] : "";
}

if($clickedIds == '' || $amount == '') {
    redirect('message.php');
    exit;
}

?><?php
$userId = $session->get('auth_user_id');
$payment = new Payment();
$balance = $payment->getBalance($userId);
$balance = json_decode($balance, true);

if(is_array($clickedIds)) {
    $array = $clickedIds;
} else {
  $array = explode(',', $clickedIds);  
}

$addition = 0;
foreach($array as $arrayitem) {
    $odd = explode('-', $arrayitem)[1];
    $addition += $odd;
}
$totalWin = $addition * $amount;

if(!isset($userId) && empty($userId)) {
    include __DIR__ .'/templates/require_user_registration.php';
    exit;
}
?>
<br><br><br>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Stake</h2>
      <p data-aos="fade-up">Below is the detail of your stake</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
        <div class="box featured">
          <h3>
              <p>Amount Staked: <?php echo '&#8358;'.number_format((float)$amount, 2, '.', ','); ?></p>
              <p>Possible win: <?php echo '&#8358;'.number_format((float)$totalWin, 2, '.', ','); ?></p>
          </h3>
            <?php foreach($array as $arrayitem) : ?> 
            <h4><?php echo explode('-', $arrayitem)[1]; ?><span> / <?php echo explode('-', $arrayitem)[0]; ?></span></h4>
            <?php endforeach; ?>

            <div class="btn-wrap">
            <form method="post" action="procedures/payment.php">
                <input type="hidden" name="array" value="<?php echo htmlspecialchars(serialize($array)); ?>">
                <input type="hidden" id="amount" name="amount" value="<?php echo $amount; ?>">
                <input class="btn btn-buy" id="submit" type="submit" name="submit" value="Make Payment">
            </form><br><br>
             <?php if(isset($userId) && $balance[0]['balance'] >= $amount) : ?>
              <form method="post" action="procedures/paybetfromwallet.php">  
                 <p>Do you want to pay from your wallet?</p>
                 <input type="hidden" name="betarray" value="<?php echo htmlspecialchars(serialize($array)); ?>">
                <input type="hidden" id="betamount" name="betamount" value="<?php echo $amount; ?>">
                 <input class="btn btn-buy" type="submit" name="submit" value="Pay with Wallet">
              </form>
            <?php endif; ?>
            <p>You can also <a href="cancelstake.php">cancel</a> this stake if you don't want to go ahead</p>
          </div>
        </div>
      </div>  
    </div>
  </div>
</section><!-- End Pricing Section -->

<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<!--<script src="js/eventprice.js"></script>-->

<?php
include __DIR__ .'/templates/footer.php'; 
?>