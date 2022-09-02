<?php
require_once __DIR__ .'/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';
?><?php
$userId = $session->get('auth_user_id');
?>

<br><br><br>
<section id="values" class="values">
  <div class="container">

    <div class="row justify-content-center" style="text-align:center;">
      <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
        <div class="card" style="background-image: url(assets/img/values-1.jpg);">
          <div class="card-body">
            <h5 class="card-title"><a href="#">Welcome to dColossus</a></h5>
                <p>You are now registered and can access the platform anytime with the email/mobile and password you provided.</p>
                <h3 class="card-title">You already placed a stake. Do you want to <a href="submitstaking.php" style="text-decoration:underline;">proceed</a> with the stake or <a href="cancelstake.php" style="text-decoration:underline;">cancel</a> it?</h3>
                <p>To view your personal profile, please <a href="profile.php?u=<?php echo $userId; ?>">click here</a>.</p>
                <p class="card-title">Welcome once again.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include __DIR__ .'/templates/footer.php'; 
?>