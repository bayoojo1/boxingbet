<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';


$awards = new Awards();

if(isset($_GET['u'])) {
    $userId = filter_input(INPUT_GET, 'u', FILTER_SANITIZE_STRING);
}
$awardEndorser = $awards->getAllEndorsers($userId);
$awardEndorser = json_decode($awardEndorser, true);
?>
 
<br><br><br>
<div class="row justify-content-center">
    <div class="col-lg-3 col-md-6" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h5>Update endorser</h5>
        <p>Edit the name and mobile of the endorser.</p>
        <form action="procedures/submitendorser.php" method="post">
            <input class="form-control" type="text" id="endorser" name="endorser" placeholder="Endorser name..." required="required" value="<?php if(isset($awardEndorser[0]['name'])) echo $awardEndorser[0]['name']; ?>"><br>
            <input class="form-control" type="text" id="mobile" name="mobile" placeholder="Endorser mobile..." required="required" value="<?php if(isset($awardEndorser[0]['mobile'])) echo $awardEndorser[0]['mobile']; ?>"><br><br>
            <input type="hidden" name="userid" value="<?php echo $userId; ?>">
            <input type="submit" name="submit" class="btn btn-danger" value="Submit">
        </form>
    </div>
</div>
<br><br><br>


<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/awards.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>

