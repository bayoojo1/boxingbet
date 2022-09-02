<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?><?php 
$isAuth = new UserAuth();
$isAuth->requireAuth();

$boxers = new User();
$returnboxers = $boxers->selectBoxers();
$listboxers = json_decode($returnboxers, true);
?>  

<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Create New Contest</h2>
    </div>
<!--    <form id="postData">-->
    <?php include_once __DIR__ .'/templates/contestForm.php'; ?>
<!--    </form>-->

  </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/createcontest.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>