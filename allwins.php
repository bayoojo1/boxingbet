<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

$contests = new Contest();
$allwins = $contests->getContestResult();
$allwins = json_decode($allwins, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Wins</h2>
      <p data-aos="fade-up">This shows all wins till date.</p>
    </div>

    <?php if(!empty($allwins) && (is_array($allwins))) : ?>
    <table id="wins" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Contest ID</th>
                <th>Contester A</th>
                <th>Contester B</th>
                <th>Result</th>
                <th>Odd</th>
                <th>Player</th>
                <th>Stake</th>
                <th>Type</th>
                <th>Win</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($allwins as $allwin) : ?> 
            <?php foreach($allwin as $index => $value) : ?>
        <tr>
            <td style="color:grey;"><?php echo $value['contestid']; ?></td>
            <td style="color:grey;"><?php echo $value['contester_a']; ?></td>
            <td style="color:grey;"><?php echo $value['contester_b']; ?></td>
            <td style="color:grey;"><?php echo $value['contest_result']; ?></td>
            <td style="color:grey;"><?php echo $value['odd']; ?></td>
            <td style="color:grey;"><a href="profile.php?u=<?php echo $value['userid']; ?>"><?php echo $value['userid']; ?></a></td>
            <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['stake'], 2, '.', ','); ?></td>
            <td style="color:grey;"><?php echo $value['stake_type']; ?></td>
            <td style="color:grey;"><?php $contests->myWins($value['odd'], $value['stake']); ?></td>
            <td style="color:grey;"><?php echo $value['created_at']; ?></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
        <div style="background-color:red;">You don't have any win available.</div>
    <?php endif; ?>
</div><br><br><br>

<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script>
    $(document).ready( function () {
    $('#wins').DataTable();
});
</script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>
            