<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?>


<br><br><br>
<section id="values" class="values">
  <div class="container">

    <div class="row justify-content-center" style="text-align:center;">
      <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
        <div class="card" style="background-image: url(assets/img/values-1.jpg);">
          <div class="card-body">
            <h5 class="card-title"><a href="">You cannot proceed!</a></h5>
                <p>You have provided an incorrect boxer's promo code. You cannot proceed with this transaction. Try again please!</p>
                <p class="card-title"><a href="ticketing.php">GO BACK</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<br><br><br>
<?php
include __DIR__ .'/templates/footer.php'; 
?>