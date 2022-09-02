<?php
require_once __DIR__ . '/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$users = new User();
$boxers = $users->selectBoxers();
$boxers = json_decode($boxers, true);

$payment = new Payment();


?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">Boxers' Promo Codes</h2>
      <p data-aos="fade-up">This shows all the boxers' promo codes.</p>
    </div>

    <?php if(!empty($boxers) && (is_array($boxers))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Boxer Alias</th>
                <th>Boxer Name</th>
                <th>Promo Code</th>
                <th>Discount</th>
                <th>-</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($boxers as $boxer) : ?> 
            <?php foreach($boxer as $index => $value) : ?>
        <tr>
            <?php 
                $promo = $payment->promoCode($value['userid']);
                $promo = json_decode($promo, true);
            ?>
            <td valign="middle" style="color:grey;"><?php echo $value['alias']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['fname'].' '.$value['lname']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $promo[0]['code']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $promo[0]['discount'].'%'; ?></td>
            <td valign="middle">
                <?php if(!isset($promo[0]['code']) && empty($promo[0]['code'])) : ?>
                    <input type="radio" value="<?php echo $value['userid']; ?>" name="selectPromoCode" required>
                <?php endif; ?>
            </td>
            <td><button id="deletePromoCode-<?php echo $value['userid']; ?>" onclick="deletePromoCode(this.id);" class="btn btn-danger">Delete</button></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">No promo code available.</div>
    <?php endif; ?>
    
    <div class="" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h5>Boxer's Promo Discount</h5>
        <p>Select a boxer above and set the percentage discount to generate the promo code.</p>
        <input type="text" id="discount" name="discount" placeholder="% discount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
        <br><br>
        <input type="button" value="Submit" id="setDiscount">
    </div>
    
</div><br><br><br>

<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script src="js/promocode.js"></script>

<script>
    $(document).ready( function () {
    $('#stakes').DataTable();
});
</script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>
            