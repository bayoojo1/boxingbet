<?php
$_SESSION["stake"] = array(0 => array("amount" => $amount, "selections" => $array, "totalWin" => $totalWin));
?>
<br><br><br>
<section id="pricing" class="pricing">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Stake</h2>
      <p data-aos="fade-up">Below is the detail of your stake</p>
      <p data-aos="fade-up">You have to <a href="login.php">Login</a> or sign up to proceed. Please fill the form below to sign up.</p>
      <p data-aos="fade-up">Note that by signing up, you are agreeing with our <a href="terms.php">Terms and Conditions</a>.</p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
            <div class="form-group mt-3">
            <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or mobile" required>
            </div>
            <div class="form-group mt-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="form-group mt-3">
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
            </div><br>
            <div class="box featured">
              <h3>
                  <p>Amount Staked: <?php echo '&#8358;'.number_format((float)$amount, 2, '.', ','); ?></p>
                  <p>Possible win: <?php echo '&#8358;'.number_format((float)$totalWin, 2, '.', ','); ?></p>
              </h3>
                <?php foreach($array as $arrayitem) : ?> 
                <h4><?php echo explode('-', $arrayitem)[1]; ?><span> / <?php echo explode('-', $arrayitem)[0]; ?></span></h4>
                <?php endforeach; ?>

                <div class="btn-wrap">
                <input class="btn btn-buy" id="signUpStakeBtn" type="submit" value="Sign Up">
              </div>
            </div>
      </div>
    </div>
  </div>
</section><!-- End Pricing Section -->

<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/userauth.js"></script>

<?php
include __DIR__ .'/../templates/footer.php'; 
?>