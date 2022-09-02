<?php
require_once __DIR__ .'/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?><?php 
$userId = $session->get('auth_user_id');

$payment = new Payment();
$balance = $payment->getBalance($userId);
$balance = json_decode($balance, true);

?>
<br><br><br>
<section id="pricing" class="pricing">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Wallet Management</h2>
      <p data-aos="fade-up">You can either refill your wallet or withdraw from your wallet.</p>
      <p data-aos="fade-up">NOTE: You can only withdraw if you have more than <?php echo '&#8358;'.number_format((float)1000, 2, '.', ','); ?> in your wallet</p>
    </div>

    <div class="row justify-content-center">

      <div class="col-lg-3 col-md-6" data-aos="fade-up">
        <div class="box featured">
        <form method="post" action="procedures/refillwallet.php">
          <h3>Refill Wallet</h3>
          <h4><sup>&#8358;</sup><?php echo number_format((float)$balance[0]['balance'], 2, '.', ','); ?><span> / wallet balance</span></h4>
            <p>Please provide the amount to refill below.</p>
            <div class="form-group mt-3">
            <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount..." oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
            </div>
            <div class="btn-wrap">
            <input type="submit" class="btn-buy" value="Refill">
            </div>
         </form>
        </div>
      </div>
      <?php if($balance[0]['balance'] > 1000) : ?>
      <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
        <div class="box featured">
        <form method="post" action="procedures/withdraw.php">
          <h3>Withdraw from Wallet</h3>
          <h4><sup>&#8358;</sup><?php echo number_format((float)$balance[0]['balance'], 2, '.', ','); ?><span> / wallet balance</span></h4>
            <p>Please provide your bank details.</p>
            <div class="form-group mt-3">
            <input type="text" class="form-control" id="bankname" name="bankname" placeholder="Bank Name..." oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
            </div>
            <div class="form-group mt-3">
            <input type="text" class="form-control" id="account" name="account" placeholder="Bank Account..." oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
            </div>
            <div class="form-group mt-3">
            <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount..." oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
            </div>
            <div class="btn-wrap">
            <input type="submit" class="btn-buy" value="Withdraw">
            </div>
        </form>
        </div>
      </div>
     <?php endif; ?>
    </div>

  </div>
</section>

<?php
include __DIR__ .'/templates/footer.php'; 
?>