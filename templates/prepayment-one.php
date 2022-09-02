<!-- ======= Values Section ======= -->
<br><br><br>
<section id="values" class="values">
  <div class="container">

    <div class="row justify-content-center" style="text-align:center;">
      <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
        <div class="card" style="background-image: url(assets/img/values-1.jpg);">
          <div class="card-body">
            <h5 class="card-title"><a href="">Ticket Details</a></h5>
              <h4 class="card-title"><?php echo $fightname; ?></h4>
                <p class="card-text">Ticket Type: <?php echo strtoupper($ticketType); ?></p>
                <p class="card-text">Price: <?php echo '&#8358;'.number_format((float)$price, 2, '.', ','); ?></p>
                <form action="procedures/payforticket.php" method="post">
                  <div style="width:100%;">
                    <?php if(!isset($userId)) : ?>
                    <div class="col-md-8 form-group" style="margin:0 auto;">
                        <input type="text" name="identity" class="form-control" id="identity" placeholder="Email or Mobile" required>
                    </div><br>
                    <?php endif; ?>
                    <div class="col-md-8 form-group mt-3 mt-md-0" style="margin:0 auto;">
                        <p class="card-text" style="margin-bottom:-2px;">Enter your boxer's promo code to enjoy discounted price if you have one.<br> 
                        TYPE IN YOUR CODE. NO COPY AND PASTE PLEASE!</p><br>
                        <input type="text" class="form-control" name="code" id="code" placeholder="Your boxer's promo code"><br>
                        <input type="hidden" name="paymentdetails" id="paymentdetails" value="<?php echo $ticketType.'-'.$eventId.'-'.$price.'-'.$fightname; ?>">
                         <input class="btn btn-danger justify-content-center" type="submit" name="submit" value="Make Payment"><br><br>
                    </div> 
                </div>
            </form>
              <?php if(isset($userId) && $balance[0]['balance'] >= $price) : ?>
              <form method="post" action="payfromwallet.php">  
                 <p>Do you want to pay from your wallet?</p>
                 <input type="hidden" name="pcode" id="pcode">
                 <input type="hidden" name="parameters" value="<?php echo $ticketType.'-'.$eventId.'-'.$price.'-'.$fightname; ?>">
                 <input class="btn btn-danger justify-content-center" type="submit" name="submit" value="Pay with Wallet">
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Values Section -->