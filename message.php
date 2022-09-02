<?php
require_once __DIR__ .'/inc/bootstrap.php';
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
            <h5 class="card-title"><a href="">Check Again!</a></h5>
                <p class="card-title">Something went wrong and we cannot proceed with your request. Please try again.</p>
                <p class="card-title">Thanks once again.</p>
              <p class="card-title"><a href="index.php">CLICK HERE TO GO BACK TO HOME PAGE</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include __DIR__ .'/templates/footer.php'; 
?>