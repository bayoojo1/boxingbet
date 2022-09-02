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
            <h5 class="card-title"><a href="">Thanks for voting</a></h5>
                <p>You can vote more for your preferred candidate. The more you vote, the greater the chances of winning.</p>
                <p class="card-title">Do you want to vote again?</p>
                <p><a href="index.php#portfolio">VOTE MORE</a>.</p>
              <p><a href="index.php">BACK TO HOME PAGE</a>.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include __DIR__ .'/templates/footer.php'; 
?>