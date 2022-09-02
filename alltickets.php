<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

$payments = new Payment();
$allticketpayments = $payments->showAllTicketPayment();
$allticketpayments = json_decode($allticketpayments, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Tickets Purchase</h2>
      <p data-aos="fade-up">This shows all tickets purchases till date.</p>
    </div>

    <?php if(!empty($allticketpayments) && (is_array($allticketpayments))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Fight Name</th>
                <th>Ticket Type</th>
                <th>Pass Code</th>
                <th>Promo Code</th>
                <th>Cost</th>
                <th>Audience</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($allticketpayments as $allticketpayment) : ?> 
            <?php foreach($allticketpayment as $index => $value) : ?>
        <tr>
            <td style="color:grey;"><?php echo $value['fightname']; ?></td>
            <td style="color:grey;"><?php echo $value['ticket_type']; ?></td>
            <td style="color:grey;"><?php echo $value['event_code']; ?></td>
            <td style="color:grey;"><?php echo isset($value['code'])? $value['code'] : ""; ?></td>
            <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['price'], 2, '.', ','); ?></td>
            <?php if(isset($value['email'])) : ?>
                <td style="color:grey;"><?php echo $value['email']; ?></td>
            <?php else : ?>
                <td style="color:grey;"><?php echo $value['mobile']; ?></td>
            <?php endif; ?>
            <td style="color:grey;"><?php echo date("F jS, Y", strtotime($value['created_at'])); ?></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">You don't have any ticket purchase available.</div>
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
            