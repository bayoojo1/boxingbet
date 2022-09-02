<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

?><?php
$awards = new Awards();

$listcategories = $awards->getCategories();
$listcategories = json_decode($listcategories, true);

$listnominees = $awards->getAllNominees();
$listnominees = json_decode($listnominees, true);

$listsponsors = $awards->getAllSponsors();
$listsponsors = json_decode($listsponsors, true);

$listpresenters = $awards->getAllPresenters();
$listpresenters = json_decode($listpresenters, true);

$listendorsers = $awards->getAllEndorsers();
$listendorsers = json_decode($listendorsers, true);

if(isset($_GET['id'])) {
    $awardId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
}
$getAwards = $awards->showAllAwards($awardId);
$getAwards = json_decode($getAwards, true);

$listcategory = $awards->getCategories($getAwards[0]['category_id']);
$listcategory = json_decode($listcategory, true);

//$listnominee = $awards->getAllNominees($getAwards[0]['nominee1_id']);
//$listnominee = json_decode($listnominee, true);

$listsponsor = $awards->getAllSponsors($getAwards[0]['sponsor_id']);
$listsponsor = json_decode($listsponsor, true);

$listpresenter = $awards->getAllPresenters($getAwards[0]['presenter_id']);
$listpresenter = json_decode($listpresenter, true);

$listendorser = $awards->getAllEndorsers($getAwards[0]['endorser_id']);
$listendorser = json_decode($listendorser, true);
?>
<br><br><br>
<div class="container">
<div style="" class="row justify-content-center">
    <div class="col-lg-6 col-md-6" style="text-align:center; margin-top:100px; border: 5px #ff5821 solid; padding:20px;" data-aos="fade-up">
        <h5>Update award</h5>
        <p>You can update the award by changing any of the values below.</p>
        <form action="procedures/updateaward.php" method="post">
            <div class="form-group mt-3 text-center">
                <?php if(!empty($listcategories) && (is_array($listcategories))) : ?>
                <select name="category" id="category"> 
                    <option value="">Select a category</option>
                    <option selected value="<?php echo $listcategory[0]['id']; ?>"><?php echo $listcategory[0]['name']; ?></option>
                    <?php foreach($listcategories as $listcategory) : ?>
                        <?php foreach($listcategory as $index => $value) : ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>
            </div>
            <br>
            <?php for ($i = 1; $i <= 5; $i++) : ?>
            <div class="form-group mt-3 text-center">
                <?php if(!empty($listnominees) && (is_array($listnominees))) : ?>
                <select name="nominee<?php echo $i; ?>" id="nominee<?php echo $i; ?>">
                    <option selected>Select Nominee <?php echo $i; ?></option>
                    <?php foreach($listnominees as $listnominee) : ?>
                        <?php foreach($listnominee as $index => $value) : ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>
            </div>
            <br>
            <?php endfor; ?>
            <div class="form-group mt-3 text-center">
                <?php if(!empty($listsponsors) && (is_array($listsponsors))) : ?>
                <select name="sponsor" id="sponsor">
                    <option values="">Select sponsor</option>
                    <option selected value="<?php echo $listsponsor[0]['id']; ?>"><?php echo $listsponsor[0]['name']; ?></option>
                    <?php foreach($listsponsors as $listsponsor) : ?>
                        <?php foreach($listsponsor as $index => $value) : ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group mt-3 text-center">
                <?php if(!empty($listpresenters) && (is_array($listpresenters))) : ?>
                <select name="presenter" id="presenter">
                    <option value="">Select presenter</option>
                    <option selected value="<?php echo $listpresenter[0]['id']; ?>"><?php echo $listpresenter[0]['name']; ?></option>
                    <?php foreach($listpresenters as $listpresenter) : ?>
                        <?php foreach($listpresenter as $index => $value) : ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>
            </div>
            <br>
            <div class="form-group mt-3 text-center">
                <?php if(!empty($listendorsers) && (is_array($listendorsers))) : ?>
                <select name="endorser" id="endorser">
                    <option value="">Select endorser</option>
                    <option selected value="<?php echo $listendorser[0]['id']; ?>"><?php echo $listendorser[0]['name']; ?></option>
                    <?php foreach($listendorsers as $listendorser) : ?>
                        <?php foreach($listendorser as $index => $value) : ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>
            </div>
            <br>
            <input type="hidden" name="awardId" value="<?php echo $awardId; ?>">
            <input type="submit" name="submit" class="btn btn-danger" value="Update">
        </form>
    </div>
</div>
    
</div><br><br><br>

<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#stakes').DataTable();
});
</script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>
            
