<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';


$awards = new Awards();

if(isset($_GET['u'])) {
    $userId = filter_input(INPUT_GET, 'u', FILTER_SANITIZE_STRING);
}
$awardSponsor = $awards->getAllSponsors($userId);
$awardSponsor = json_decode($awardSponsor, true);
?>
 
<br><br><br>
<div class="row justify-content-center">
    <div class="col-lg-3 col-md-6" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h5>Update sponsor</h5>
        <p>Edit the name, mobile and upload the picture of the sponsor.</p>
        <form action="procedures/submitsponsor.php" method="post" enctype="multipart/form-data">
            <input class="form-control" type="text" id="sponsor" name="sponsor" placeholder="Sponsor name..." required="required" value="<?php if(isset($awardSponsor[0]['name'])) echo $awardSponsor[0]['name']; ?>"><br>
            <input class="form-control" type="text" id="mobile" name="mobile" placeholder="Sponsor mobile..." required="required" value="<?php if(isset($awardSponsor[0]['mobile'])) echo $awardSponsor[0]['mobile']; ?>"><br><br>
            <input type="file" name="photo" id="photo">
            <br><br>
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

