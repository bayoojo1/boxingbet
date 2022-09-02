<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

if(isset($_GET['u'])) {
    $userId = filter_input(INPUT_GET, 'u', FILTER_SANITIZE_STRING);
}
$payment = new Payment();
$withrawrequests = $payment->getWithrawRequest($userId);
$withrawrequests = json_decode($withrawrequests, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">My Withrawal History</h2>
      <p data-aos="fade-up">This shows all my withdrawal till date.</p>
    </div>

    <?php if(!empty($withrawrequests) && (is_array($withrawrequests))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>User</th>
                <th>Bank Name</th>
                <th>Bank Account</th>
                <th>Amount</th>
                <th>Payment Status</th>
                <th>Date Requested</th>
                <th>Date Paid</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($withrawrequests as $withrawrequest) : ?> 
            <?php foreach($withrawrequest as $index => $value) : ?>
        <tr>
            <td style="color:grey;"><?php echo $value['userid']; ?></td>
            <td style="color:grey;"><?php echo $value['bank_name']; ?></td>
            <td style="color:grey;"><?php echo $value['bank_account']; ?></td>
            <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['amount'], 2, '.', ','); ?></td>
            <td style="color:grey;"><?php echo $value['paid']; ?></td>
            <td style="color:grey;"><?php echo $value['requested_date']; ?></td>
            <td style="color:grey;"><?php echo $value['paid_date']; ?></td> 
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">You don't have any withdrawal history.</div>
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
            