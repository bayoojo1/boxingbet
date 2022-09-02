<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';


$awards = new Awards();

if(isset($_GET['u'])) {
    $userId = filter_input(INPUT_GET, 'u', FILTER_SANITIZE_STRING);
}
$awardPresenter = $awards->getAllPresenters($userId);
$awardPresenter = json_decode($awardPresenter, true);
?>
 
<br><br><br>
<div class="row justify-content-center">
    <div class="col-lg-3 col-md-6" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h5>Update presenter</h5>
        <p>Edit the name and mobile of the presenter.</p>
        <form action="procedures/submitpresenter.php" method="post">
            <input class="form-control" type="text" id="presenter" name="presenter" placeholder="Presenter name..." required="required" value="<?php if(isset($awardPresenter[0]['name'])) echo $awardPresenter[0]['name']; ?>"><br>
            <input class="form-control" type="text" id="mobile" name="mobile" placeholder="Presenter mobile..." required="required" value="<?php if(isset($awardPresenter[0]['mobile'])) echo $awardPresenter[0]['mobile']; ?>"><br><br>
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

