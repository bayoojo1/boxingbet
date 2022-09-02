<?php
require_once __DIR__ . '/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$userId = $session->get('auth_user_id');

$payments = new Payment();
$allwallettrans = $payments->showAllWalletTrans($userId);
$allwallettrans = json_decode($allwallettrans, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Wallet Transactions</h2>
      <p data-aos="fade-up">This shows all my wallet transanctions till date.</p>
    </div>

    <?php if(!empty($allwallettrans) && (is_array($allwallettrans))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Payment Type</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($allwallettrans as $allwallettran) : ?> 
            <?php foreach($allwallettran as $index => $value) : ?>
            <?php 
                if($value['amount'] < 0) {
                    $amount = "<span style='color:red;'>&#8358;".number_format((float)$value['amount'], 2, '.', ',')."</span>";
                } else {
                   $amount = "<span style='color:green;'>&#8358;".number_format((float)$value['amount'], 2, '.', ',')."</span>";
                }
            ?>
        <tr>
            <td style="color:grey;"><?php echo ucfirst($value['payment_type']); ?></td>
            <td style="color:grey;"><?php echo $amount; ?></td>
            <td style="color:grey;"><?php echo date("F jS, Y", strtotime($value['created_at'])); ?></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">You don't have any wallet transanctions available.</div>
    <?php endif; ?>
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
            