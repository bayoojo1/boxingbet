<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?>  

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Login</h2>
    </div>

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
      <div class="col-xl-9 col-lg-12 mt-4">
        <div class="php-email-form">
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or mobile" required>
          </div>
          <div class="form-group mt-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          </div>
          <br>
          <div class="my-3">
            <div style="float:right;"><a href="signup.php">Sign Up</a></div><br>
            <div style="float:right;"><a href="registerboxer.php">Register as a boxer</a></div>
            <div style="float:left;"><a href="forgotpassword.php">Forgot your password?</a></div>
          </div>
          <br />
          <div class="text-center"><input type="submit" id="btnLogin" value="Login" style="background-color:#ff5821; color:white;"></div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->
<script src="js/jquery.min.js"></script>
<script src="js/userauth.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>