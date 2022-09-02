<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

if(isset($_GET['ctId'])) {
    $contestId = filter_input(INPUT_GET, 'ctId', FILTER_SANITIZE_STRING);
}

$allcontest = new Contest();
$contest = $allcontest->getAllContest($contestId);
$contest = json_decode($contest, true);
$showWin = $allcontest->getWin($contestId);
$showWin = json_decode($showWin, true);
$buttonText = 'Update Contest';
?>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Update Contest</h2>
    </div>
    <?php include __DIR__ .'/templates/contestForm.php'; ?>
  </div>
</section><!-- End Contact Section -->

<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/updatecontest.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>
