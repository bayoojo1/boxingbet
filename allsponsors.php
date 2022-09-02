<?php
require_once __DIR__ . '/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$awards = new Awards();
$awardsponsors = $awards->getAllSponsors();
$awardsponsors = json_decode($awardsponsors, true);


?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Award Sponsors</h2>
      <p data-aos="fade-up">This shows all the award sponsors.</p>
    </div>

    <?php if(!empty($awardsponsors) && (is_array($awardsponsors))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Sponsor Name</th>
                <th>Sponsor Mobile</th>
                <th>Picture</th>
                <th>-</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($awardsponsors as $awardsponsor) : ?> 
            <?php foreach($awardsponsor as $index => $value) : ?>
        <tr>
            <td valign="middle" style="color:grey;"><?php echo $value['name']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['mobile']; ?></td>
            <td valign="middle" style="color:grey;"><img style="height:50px; width:50px;" src="<?php echo $value['img_url']; ?>"></td>
            <td valign="middle"><a href="updatesponsor.php?u=<?php echo $value['id']; ?>"><button class="btn btn-primary">Update</button></a></td>
            <td valign="middle"><button class="btn btn-danger">Delete</button></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">No sponsor available.</div>
    <?php endif; ?>
    
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h5>Create new sponsor</h5>
        <p>Enter the name, mobile and upload the picture of the sponsor.</p>
        <form action="procedures/submitsponsor.php" method="post" enctype="multipart/form-data">
            <input class="form-control" type="text" id="sponsor" name="sponsor" placeholder="Sponsor name..." required="required"><br>
            <input class="form-control" type="text" id="mobile" name="mobile" placeholder="Sponsor mobile..." required="required"><br><br>
            <input type="file" name="photo" id="photo">
            <br><br>
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
            