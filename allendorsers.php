<?php
require_once __DIR__ . '/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$awards = new Awards();
$awardendorsers = $awards->getAllEndorsers();
$awardendorsers = json_decode($awardendorsers, true);


?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Award Endorsers</h2>
      <p data-aos="fade-up">This shows all the award endorsers.</p>
    </div>

    <?php if(!empty($awardendorsers) && (is_array($awardendorsers))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Endorser Name</th>
                <th>Endorser Mobile</th>
                <th>-</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($awardendorsers as $awardendorser) : ?> 
            <?php foreach($awardendorser as $index => $value) : ?>
        <tr>
            <td valign="middle" style="color:grey;"><?php echo $value['name']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['mobile']; ?></td>
            <td valign="middle"><a href="updateendorser.php?u=<?php echo $value['id']; ?>"><button class="btn btn-primary">Update</button></a></td>
            <td valign="middle"><button class="btn btn-danger">Delete</button></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">No endorser available.</div>
    <?php endif; ?>
    
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h5>Create new endorser</h5>
        <p>Enter the name and mobile of the endorser.</p>
        <form action="procedures/submitendorser.php" method="post">
            <input class="form-control" type="text" id="endorser" name="endorser" placeholder="Endorser name..." required="required"><br>
            <input class="form-control" type="text" id="mobile" name="mobile" placeholder="Endorser mobile..." required="required"><br><br>
            <input type="submit" name="submit" class="btn btn-danger" value="Submit">
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
            