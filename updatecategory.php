<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';


$awards = new Awards();

if(isset($_GET['catId'])) {
    $catId = filter_input(INPUT_GET, 'catId', FILTER_SANITIZE_STRING);
}
$awardCat = $awards->getCategories($catId);
$awardCat = json_decode($awardCat, true);
?>
 
<br><br><br>
<div class="container">
    <div class="" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h5>Update category</h5>
        <p>You can edit the category name and description.</p>
        <input class="form-control" type="text" id="catname" name="catname" placeholder="Category name..." oninput="this.value = this.value.replace(/[^0-9a-zA-Z ,.]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required" value="<?php if(isset($awardCat[0]['name'])) echo $awardCat[0]['name']; ?>" ><br><br>
        <textarea class="form-control" type="text" id="catdesc" name="catdesc" placeholder="Category description..." required="required"><?php if(isset($awardCat[0]['description'])) echo $awardCat[0]['description']; ?></textarea>
        <br><br>
        <input type="hidden" id="catId" value="<?php echo $catId; ?>">
        <input type="button" class="btn btn-danger" value="Update" id="updateCategory">
    </div>
</div>
<br><br><br>


<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/awards.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>

