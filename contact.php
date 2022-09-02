<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Contact</h2>
      <p data-aos="fade-up">There are many ways you can contact us at DColossus. Below are different means you can use to reach us. We are always available and ready to respond to your feedbacks.</p>
    </div>

    <div class="row justify-content-center">

      <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
        <div class="info-box">
          <i class="bx bx-map"></i>
          <h3>Our Address</h3>
          <p>24, Aka Avenue, Ti Oluwani Estate, Obada Abeokuta</p>
        </div>
      </div>

      <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="100">
        <div class="info-box">
          <i class="bx bx-envelope"></i>
          <h3>Email Us</h3>
          <p>dcolossus.com@gmail.com</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up" data-aos-delay="200">
        <div class="info-box">
          <i class="bx bx-phone-call"></i>
          <h3>Call Us</h3>
          <p>+2347033339369</p>
        </div>
      </div>
    </div>

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
      <div class="col-xl-9 col-lg-12 mt-4">
        <form action="sendEmail.php" method="post" role="form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div><br>
          <div id="imgparent" style="text-align:center;">
            <span id="imgdiv">
            <img id="img" src="captcha.php">
            </span>
            <img id="reload" src="assets/img/refresh.jpeg" style="width:40px; height:40px; cursor:pointer;" title="Refresh">
            </div><br />
            <div style="text-align:center;">
            <span>Enter Image Text:</span>
            <span>
            <input id="captcha1" name="captcha" type="text" required>
            </span>
            </div><br />
          <div class="text-center"><input type="submit" value="Send Message"></div>
        </form>
      </div>

    </div>

  </div>
</section><!-- End Contact Section -->
<script src="js/jquery.min.js"></script>
<script src="js/captcha.js"></script>


<?php
include __DIR__ .'/templates/footer.php'; 
?>