<br><br><br>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Tikcet</h2>
      <p data-aos="fade-up">Below is your purchased ticket. Please keep the details. You can just take a snapshot right away.</p>
      <p data-aos="fade-up">You are getting a discount as a result of boxer's code: <?php echo $promoCode; ?></p>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
        <div class="box featured">
          <h3>
              <p>Location: <?php echo $eventDetail[0]['event_location']; ?></p>
              <p>Date: <?php echo date("F jS, Y g:i a", strtotime($eventDetail[0]['event_date'])); ?></p>
              <p>Fight Title: <?php echo $fightname; ?></p>
          </h3>
            <h4><?php echo '&#8358;'.number_format((float)$price, 2, '.', ','); ?><span> / <?php echo $ticketType; ?></span></h4>
            <h5><?php echo $eventPassCode; ?></h5>
            <div class="btn-wrap">
            <input class="btn btn-buy" id="submit" type="submit" name="submit" value="Print">
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Pricing Section -->