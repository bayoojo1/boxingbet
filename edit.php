<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?><?php 
$ownerId = $session->get('auth_user_id');
$userdetail = new User();
$user = $userdetail->findUserById($ownerId);
$user = json_decode($user, true);
$buttonText = 'Update Profile';
?>  

<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Edit Boxer Profile</h2>
    </div>
    <form id="postData">
        <?php include_once __DIR__ .'/templates/postForm.php'; ?>
    </form>

  </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/updateboxerprofile.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>