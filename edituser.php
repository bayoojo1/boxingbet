<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

if(isset($_GET['u'])) {
    $userId = filter_input(INPUT_GET, 'u', FILTER_SANITIZE_STRING);
}
$userdetail = new User();
$user = $userdetail->findUserById($userId);
$user = json_decode($user, true);
?>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Edit User Profile</h2>
    </div>
    <form method="post", action="procedures/updateUserProfile.php">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
      <div class="col-xl-9 col-lg-12 mt-4">
        <div class="php-email-form">
          <div class="form-group mt-3">
            <?php if(isset($user[0]['email'])) : ?>
                <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or mobile" value="<?php echo $user[0]['email']; ?>" disabled>
            <?php elseif (isset($user[0]['mobile'])) : ?>
                <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or mobile" value="<?php echo $user[0]['mobile']; ?>" disabled>
            <?php else : ?>
                <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or mobile" required>
            <?php endif; ?>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php if(isset($user[0]['fname'])) echo $user[0]['fname']; ?>">
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php if(isset($user[0]['lname'])) echo $user[0]['lname']; ?>">
          </div>
          <div class="form-group mt-3">
            <?php if(isset($user[0]['email'])) : ?>
                <input type="text" class="form-control" name="mymobile" id="mymobile" placeholder="Mobile" value="<?php if(isset($user[0]['mymobile'])) echo $user[0]['mymobile']; ?>">
            <?php elseif (isset($user[0]['mobile'])) : ?>
                <input type="text" class="form-control" name="myemail" id="myemail" placeholder="Email" value="<?php if(isset($user[0]['myemail'])) echo $user[0]['myemail']; ?>">
            <?php endif; ?>
                <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $user[0]['userid']; ?>">
          </div> 
          <br>
          <br />
          <div class="text-center"><input type="submit" value="Update" style="background-color:#ff5821; color:white;"></div>
        </div>
      </div>
    </div>
  </form>
  </div>
</section><!-- End Contact Section -->

<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>