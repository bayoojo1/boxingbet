<?php
require_once __DIR__ .'/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

if(isset($_POST['awardId'])) { 
   $awardId = filter_input(INPUT_POST, 'awardId', FILTER_SANITIZE_STRING);
}
if($awardId == '') {
    redirect('message.php');
}

$awards = new Awards();
$getAwards = $awards->showAllAwards($awardId);
$getAwards = json_decode($getAwards, true);

$listcategory = $awards->getCategories($getAwards[0]['category_id']);
$listcategory = json_decode($listcategory, true);

$listnominee1 = $awards->getAllNominees($getAwards[0]['nominee1_id']);
$listnominee1 = json_decode($listnominee1, true);

$listnominee2 = $awards->getAllNominees($getAwards[0]['nominee2_id']);
$listnominee2 = json_decode($listnominee2, true);

$listnominee3 = $awards->getAllNominees($getAwards[0]['nominee3_id']);
$listnominee3 = json_decode($listnominee3, true);

$listnominee4 = $awards->getAllNominees($getAwards[0]['nominee4_id']);
$listnominee4 = json_decode($listnominee4, true);

$listnominee5 = $awards->getAllNominees($getAwards[0]['nominee5_id']);
$listnominee5 = json_decode($listnominee5, true);

$listsponsor = $awards->getAllSponsors($getAwards[0]['sponsor_id']);
$listsponsor = json_decode($listsponsor, true);

$listpresenter = $awards->getAllPresenters($getAwards[0]['presenter_id']);
$listpresenter = json_decode($listpresenter, true);

$listendorser = $awards->getAllEndorsers($getAwards[0]['endorser_id']);
$listendorser = json_decode($listendorser, true);

// Create an array of nominees
$array = array($listnominee1, $listnominee2, $listnominee3, $listnominee4, $listnominee5);
?>
<br><br><br>
<section class="voting">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
      <div class="col-xl-6 col-lg-12 mt-4 awardvote">
          <div class="form-group mt-3">
            <h2 data-aos="fade-up" class="text-center" style="color:white;"><?php echo $listcategory[0]['name']; ?></h2>
          <br><br><br>
        
         <div class="fight" style="text-align:center; color:white;"> 
            <?php foreach($array as $key => $value) : ?>
            <?php if(!empty(array_filter($value))) : ?>
            <div class="fighter">   
                <h4>Nominee <?php echo $key + 1; ?></h4>
                <img src="<?php echo isset($value[0]['img_url'])? $value[0]['img_url'] : "https://via.placeholder.com/600/09f/fff.png"; ?>" style="width:200px;" class="testimonial-img t-img" alt="">
                <h3><?php echo $value[0]['name']; ?></h3>
            </div>
            <?php endif; ?>
        <?php endforeach; ?> 
        </div>
        </div>
        <div style="text-align:center; color:white;">
            <p>Award Sponsor: <?php echo $listsponsor[0]['name']; ?></p>
            <?php if(isset($listendorser)) : ?>
                <p>Award Endorser: <?php echo $listendorser[0]['name']; ?></p>
            <?php endif; ?>
            <p>Award Presenter: <?php echo $listpresenter[0]['name']; ?></p>
        </div><br><br><br>
        <p style="text-align:center; color:white;">Select your nominee and the number of vote below. Each vote cost &#8358;100 and minimum of 5 votes</p>
        <div style="text-align:center; color:white;">
        <form method="post" action="paymentforvote.php">
            <?php if(!empty($array) && (is_array($array))) : ?>
                <select name="nominee" id="nominee"> 
                    <option value="">Select a nominee</option>
                        <?php foreach($array as $index => $value) : ?>
                        <?php if(!empty(array_filter($value))) : ?>
                        <option value="<?php echo $value[0]['id']; ?>"><?php echo $value[0]['name']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select><br><br><br>
                <?php endif; ?>
            <div id="mdiv">
                <div id="minus" class="cdiv"><input type="button" size="5" value="-"></div>
                <div class="cdiv" style="font-size:30px;"><input name="qty" id="qty" type="text" value="5" style="width:100px; text-align:center;"></div>
                <div id="plus" class="cdiv"><input type="button" size="5" value="+"></div>
            </div><br><br>
            <p style="text-align:center; color:white;">Total cost of vote is: &#8358;<span id="voteCost">500</span></p>
             <input type="hidden" name="sponsorImg" value="<?php echo $listsponsor[0]['img_url']; ?>">
             <input type="hidden" name="catId" value="<?php echo $getAwards[0]['category_id']; ?>">
             <input class="btn btn-danger" type="submit" name="submit" value="Pay" style="margin-bottom:10px;">
        </form> 
        </div>
    </div>
    </div>
</section>
<br>
<br />
<style>
    .voting {
        background-image: url("<?php echo $listsponsor[0]['img_url']; ?>");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }
    .awardvote {
        background-color: black;
        opacity: 90%;
    }
</style>
<link href="assets/css/custom.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/stakebet.js"></script>


<?php
include __DIR__ .'/templates/footer.php'; 
?>

