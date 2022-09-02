<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

if(isset($_GET['u'])) {
    $userId = filter_input(INPUT_GET, 'u', FILTER_SANITIZE_STRING);
}
$contests = new Contest();
$mywins = $contests->getContestResult($userId);
$mywins = json_decode($mywins, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">My Wins</h2>
      <p data-aos="fade-up">This shows all my wins till date.</p>
    </div>

    <?php if(!empty($mywins) && (is_array($mywins))) : ?>
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Contest ID</th>
                <th>Contester A</th>
                <th>Contester B</th>
                <th>Result</th>
                <th>Odd</th>
                <th>Stake</th>
                <th>My Win</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($mywins as $mywin) : ?> 
            <?php foreach($mywin as $index => $value) : ?>
        <tr>
            <td style="color:grey;"><?php echo $value['contestid']; ?></td>
            <td style="color:grey;"><?php echo $value['contester_a']; ?></td>
            <td style="color:grey;"><?php echo $value['contester_b']; ?></td>
            <td style="color:grey;"><?php echo $value['contest_result']; ?></td>
            <td style="color:grey;"><?php echo $value['odd']; ?></td>
            <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['stake'], 2, '.', ','); ?></td>
            <td style="color:grey;"><?php $contests->myWins($value['odd'], $value['stake']); ?></td>
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
            