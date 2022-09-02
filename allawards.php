<?php
require_once __DIR__ . '/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$awards = new Awards();
$allawards = $awards->showAllAwards();
$allawards = json_decode($allawards, true);

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
?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Awards</h2>
      <p data-aos="fade-up">This shows all the awards.</p>
    </div>

    <?php if(!empty($allawards) && (is_array($allawards))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Category</th>
                <th>Nominee1</th>
                <th>Nominee2</th>
                <th>Nominee3</th>
                <th>Nominee4</th>
                <th>Nominee5</th>
                <th>Sponsor</th>
                <th>Presenter</th>
                <th>Endorser</th>
                <th>Status</th>
                <th>-</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($allawards as $allaward) : ?> 
            <?php foreach($allaward as $index => $value) : ?>
            <?php
                $category = $awards->getCategoryName($value['category_id']);
                $category = json_decode($category, true);
                $nominee1 = $awards->getNomineeName($value['nominee1_id']);
                $nominee1 = json_decode($nominee1, true);
                $nominee2 = $awards->getNomineeName($value['nominee2_id']);
                $nominee2 = json_decode($nominee2, true);
                $nominee3 = $awards->getNomineeName($value['nominee3_id']);
                $nominee3 = json_decode($nominee3, true);
                $nominee4 = $awards->getNomineeName($value['nominee4_id']);
                $nominee4 = json_decode($nominee4, true);
                $nominee5 = $awards->getNomineeName($value['nominee5_id']);
                $nominee5 = json_decode($nominee5, true);
                $sponsor = $awards->getSponsorName($value['sponsor_id']);
                $sponsor = json_decode($sponsor, true);
                $presenter = $awards->getPresenterName($value['presenter_id']);
                $presenter = json_decode($presenter, true);
                $endorser = $awards->getEndorserName($value['endorser_id']);
                $endorser = json_decode($endorser, true);
                //Display vote counts
                $voteCountN1 = $awards->showVotes($value['category_id'], $value['nominee1_id']);  
                $voteCountN1 = json_decode($voteCountN1, true);
                if(isset($value['nominee2_id'])) {
                  $voteCountN2 = $awards->showVotes($value['category_id'], $value['nominee2_id']);  
                  $voteCountN2 = json_decode($voteCountN2, true);
                }
                if(isset($value['nominee3_id'])) {
                  $voteCountN3 = $awards->showVotes($value['category_id'], $value['nominee3_id']);  
                  $voteCountN3 = json_decode($voteCountN3, true);
                }
                if(isset($value['nominee4_id'])) {
                  $voteCountN4 = $awards->showVotes($value['category_id'], $value['nominee4_id']);  
                  $voteCountN4 = json_decode($voteCountN4, true);
                }
                if(isset($value['nominee5_id'])) {
                  $voteCountN5 = $awards->showVotes($value['category_id'], $value['nominee5_id']);  
                  $voteCountN5 = json_decode($voteCountN5, true);
                }
            ?>
        <tr>
            <td valign="middle" style="color:grey;"><?php echo $category[0]['name']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $nominee1[0]['name']; ?>
                <?php if(isset($voteCountN1[0]['voteCount'])) : ?>
                <button type="button" class="btn btn-primary"><span class="badge"><?php echo $voteCountN1[0]['voteCount']; ?></span></button>
                <?php endif; ?>
            </td>
            <td valign="middle" style="color:grey;"><?php echo $nominee2[0]['name']; ?>
                <?php if(isset($voteCountN2[0]['voteCount'])) : ?>
                <button type="button" class="btn btn-primary"><span class="badge"><?php echo $voteCountN2[0]['voteCount']; ?></span></button>
                <?php endif; ?>
            </td>
            <td valign="middle" style="color:grey;"><?php echo $nominee3[0]['name']; ?>
                <?php if(isset($voteCountN3[0]['voteCount'])) : ?>
                <button type="button" class="btn btn-primary"><span class="badge"><?php echo $voteCountN3[0]['voteCount']; ?></span></button>
                <?php endif; ?>
            </td>
            <td valign="middle" style="color:grey;"><?php echo $nominee4[0]['name']; ?>
                <?php if(isset($voteCountN4[0]['voteCount'])) : ?>
                <button type="button" class="btn btn-primary"><span class="badge"><?php echo $voteCountN4[0]['voteCount']; ?></span></button>
                <?php endif; ?>
            </td>
            <td valign="middle" style="color:grey;"><?php echo $nominee5[0]['name']; ?>
                <?php if(isset($voteCountN5[0]['voteCount'])) : ?>
                <button type="button" class="btn btn-primary"><span class="badge"><?php echo $voteCountN5[0]['voteCount']; ?></span></button>
                <?php endif; ?>
            </td>
            <td valign="middle" style="color:grey;"><?php echo $sponsor[0]['name']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $presenter[0]['name']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $endorser[0]['name']; ?></td>
            <?php if($value['openOrclosed'] === 'open') : ?>
                <td valign="middle" style="color:forestgreen; cursor:pointer; font-weight:bold;" id="open-<?php echo $value['id']; ?>" onclick="changeStatus(this.id);"><?php echo $value['openOrclosed']; ?></td>
            <?php else : ?>
                <td valign="middle" style="color:red; cursor:pointer; font-weight:bold;" id="closed-<?php echo $value['id']; ?>" onclick="changeStatus(this.id);"><?php echo $value['openOrclosed']; ?></td>
            <?php endif; ?>
            <td valign="middle"><a href="updateaward.php?id=<?php echo $value['id']; ?>"><button class="btn btn-primary">Update</button></a></td>
            <td valign="middle"><button class="btn btn-danger">Delete</button></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">No award available.</div>
    <?php endif; ?>
    
<div style="" class="row justify-content-center">
    <div class="col-lg-6 col-md-6" style="text-align:center; margin-top:100px; border: 5px #ff5821 solid; padding:20px;" data-aos="fade-up">
        <h5>Create new award</h5>
        <p>Select the details of the award from the drop down below to create a new award.</p>
        <form action="procedures/submitaward.php" method="post">
            <div class="form-group mt-3 text-center">
                <?php if(!empty($listcategories) && (is_array($listcategories))) : ?>
                <select name="category" id="category">
                    <option selected disabled>Select a category</option>
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
                    <option selected disabled>Select Nominee <?php echo $i; ?></option>
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
                    <option selected disabled>Select sponsor</option>
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
                    <option selected disabled>Select presenter</option>
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
                    <option selected disabled>Select endorser</option>
                    <?php foreach($listendorsers as $listendorser) : ?>
                        <?php foreach($listendorser as $index => $value) : ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
                <?php endif; ?>
            </div>
            <br>
            <input type="submit" name="submit" class="btn btn-danger" value="Submit">
        </form>
    </div>
</div>
    
</div><br><br><br>

<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script src="js/awards.js"></script>

<script>
    $(document).ready( function () {
    $('#stakes').DataTable();
});
</script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>
            