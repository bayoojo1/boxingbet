<?php
require_once __DIR__ .'/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?><?php
unset($_SESSION["stake"]);
?>

<br><br><br>
<section id="values" class="values">
  <div class="container">

    <div class="row justify-content-center" style="text-align:center;">
      <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
        <div class="card" style="background-image: url(assets/img/values-1.jpg);">
          <div class="card-body">
            <h5 class="card-title"><a href="#">Stake Cancelled!</a></h5>
                <h3 class="card-title">You can always place a new bet at anytime. To bet again, <a href="stakebet.php" style="text-decoration:underline;">click here</a></h3>
                <p class="card-title">Thank you.</p>
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