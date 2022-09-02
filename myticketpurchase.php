<?php
require_once __DIR__ . '/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$userId = $session->get('auth_user_id');

$payments = new Payment();
$allmyticketpurchases = $payments->showAllMyTicketsPurchase($userId);
$allmyticketpurchases = json_decode($allmyticketpurchases, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All My Ticket Purchases</h2>
      <p data-aos="fade-up">This shows all my ticket purchases till date.</p>
    </div>

    <?php if(!empty($allmyticketpurchases) && (is_array($allmyticketpurchases))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Ticket Type</th>
                <th>Amount</th>
                <th>Fight Name</th>
                <th>Promo Code</th>
                <th>Pass Code</th>
                <th>Purchase Date</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($allmyticketpurchases as $allmyticketpurchase) : ?> 
            <?php foreach($allmyticketpurchase as $index => $value) : ?>
        <tr>
            <td style="color:grey;"><?php echo strtoupper($value['ticket_type']); ?></td>
            <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['price'], 2, '.', ','); ?></td>
            <td style="color:grey;"><?php echo $value['fightname']; ?></td>
            <td style="color:grey;"><?php echo $value['code']; ?></td>
            <td style="color:grey;"><?php echo $value['event_code']; ?></td>
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
            