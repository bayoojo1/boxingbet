<?php
require_once __DIR__ . '/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$awards = new Awards();
$awardcategories = $awards->getCategories();
$awardcategories = json_decode($awardcategories, true);


?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Award Categories</h2>
      <p data-aos="fade-up">This shows all the award categories.</p>
    </div>

    <?php if(!empty($awardcategories) && (is_array($awardcategories))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Category Name</th>
                <th>Category Description</th>
                <th>-</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($awardcategories as $awardcategory) : ?> 
            <?php foreach($awardcategory as $index => $value) : ?>
        <tr>
            <td valign="middle" style="color:grey;"><?php echo $value['name']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['description']; ?></td>
            <td><a href="updatecategory.php?catId=<?php echo $value['id']; ?>"><button class="btn btn-primary">Update</button></a></td>
            <td><button class="btn btn-danger">Delete</button></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">No category available.</div>
    <?php endif; ?>
    
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h5>Create new category</h5>
        <p>Enter the name and description of the new category below and submit.</p>
        <input class="form-control" type="text" id="catname" name="catname" placeholder="Category name..." oninput="this.value = this.value.replace(/[^0-9a-zA-Z ,.]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required"><br><br>
        <textarea class="form-control" type="text" id="catdesc" name="catdesc" placeholder="Category description..." required="required"></textarea>
        <br><br>
        <input type="button" class="btn btn-danger" value="Submit" id="submitCategory">
    </div>
</div>
    
</div><br><br><br>

<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
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
            