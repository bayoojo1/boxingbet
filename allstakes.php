<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

$contests = new Contest();
$contestLists = $contests->getStake();
$contestLists = json_decode($contestLists, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Stakes</h2>
      <p data-aos="fade-up">This shows all stakes till date.</p>
    </div>

    <?php if(!empty($contestLists) && (is_array($contestLists))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Contest ID</th>
                <th>Possibility</th>
                <th>Odd</th>
                <th>Stake</th>
                <th>Type</th>
                <th>Player</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($contestLists as $contestList) : ?> 
            <?php foreach($contestList as $index => $value) : ?>
        <tr>
            <td style="color:grey;"><?php echo $value['contestid']; ?></td>
            <td style="color:grey;"><?php echo $value['possibility']; ?></td>
            <td style="color:grey;"><?php echo $value['odd']; ?></td>
            <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['stake'], 2, '.', ','); ?></td>
            <td style="color:grey;"><?php echo $value['stake_type']; ?></td>
            <td style="color:grey;"><a href="profile.php?u=<?php echo $value['userid']; ?>"><?php echo $value['userid']; ?></a></td>
            <td style="color:grey;"><?php echo date("F jS, Y", strtotime($value['created_at'])); ?></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">You don't have any stake available.</div>
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
            