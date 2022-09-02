<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?>  

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Register as a Boxer</h2>
    </div>

    <?php include_once __DIR__ .'/templates/postForm.php'; ?>

  </div>
</section><!-- End Contact Section -->
<script src="js/jquery.min.js"></script>
<script src="js/userauth.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>