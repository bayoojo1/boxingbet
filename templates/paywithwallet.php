<br><br><br>
<section id="values" class="values">
  <div class="container">

    <div class="row justify-content-center" style="text-align:center;">
      <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
        <div class="card" style="background-image: url('<?php echo $sponsorImg; ?>');">
          <div class="card-body">
            <h5 class="card-title">Pay with Wallet</h5>
                <p class="card-title">You are paying <?php echo '&#8358;'.number_format((float)$totalVoteCost, 2, '.', ','); ?></p>
                <p class="card-title">Number of votes: <?php echo $voteCounts; ?></p>
                <p class="card-title">Nominee: <?php echo $nomineeName; ?></p>
                <br><br>
              <form method="post" action="procedures/votepayment.php">
                <input type="hidden" name="votePara" value="<?php echo $totalVoteCost.'-'.$nominee.'-'.$voteCounts.'-'.$catId; ?>">
                <input type="submit" class="btn btn-danger" name="wallet" value="Pay with Wallet">
                <br><br>
                <input type="submit" class="btn btn-danger" name="paystack" value="Make Payment">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>