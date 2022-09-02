<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$isAuth = new UserAuth();
$isAuth->requireAuth();

$contests = new Contest();
$allcontests = $contests->getAllContest();
$allcontests = json_decode($allcontests, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">Contests</h2>
      <p data-aos="fade-up">This shows all contests till date.</p>
    </div>
    <div class="text-center"><a href="createcontest.php"><button class="btn btn-primary">Create New Contest</button></a></div>
    <?php if(!empty($allcontests) && (is_array($allcontests))) : ?>
    <div style="overflow-x:auto;">
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Contest ID</th>
                <th>Contester A</th>
                <th>Contester B</th>
                <th>A wins B</th>
                <th>B wins A</th>
                <th>A wins TKO</th>
                <th>B wins TKO</th>
                <th>A wins Split</th>
                <th>B wins Split</th>
                <th>A wins Unanimous</th>
                <th>B wins Unanimous</th>
                <th>Draw</th>
                <th>A r1 TKO</th>
                <th>B r1 TKO</th>
                <th>A r2 TKO</th>
                <th>B r2 TKO</th>
                <th>A r3 TKO</th>
                <th>B r3 TKO</th>
                <th>A r4 TKO</th>
                <th>B r4 TKO</th>
                <th>A r5 TKO</th>
                <th>B r5 TKO</th>
                <th>A r6 TKO</th>
                <th>B r6 TKO</th>
                <th>A r7 TKO</th>
                <th>B r7 TKO</th>
                <th>A r8 TKO</th>
                <th>B r8 TKO</th>
                <th>A r9 TKO</th>
                <th>B r9 TKO</th>
                <th>A r10 TKO</th>
                <th>B r10 TKO</th>
                <th>A r11 TKO</th>
                <th>B r11 TKO</th>
                <th>A r12 TKO</th>
                <th>B r12 TKO</th>
                <th>-</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($allcontests as $allcontest) : ?> 
            <?php foreach($allcontest as $index => $value) : ?>
            <?php
                $boxerA = $contests->getContesterName($value['contester_a']);
                $boxerA = json_decode($boxerA, true);
                $boxerB = $contests->getContesterName($value['contester_b']);
                $boxerB = json_decode($boxerB, true);
            ?>
        <tr>
            <td valign="middle" style="color:grey;"><?php echo $value['contestid']; ?></td>
            <td valign="middle" style="color:grey;"><a href="profile.php?u=<?php echo $value['contester_a']; ?>"><?php echo $boxerA[0]['alias']; ?></a></td>
            <td valign="middle" style="color:grey;"><a href="profile.php?u=<?php echo $value['contester_b']; ?>"><?php echo $boxerB[0]['alias']; ?></a></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_wins_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_wins_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_wins_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_wins_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_wins_split_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_wins_split_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_wins_unanimous_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_wins_unanimous_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['draw_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r1_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r1_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r2_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r2_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r3_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r3_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r4_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r4_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r5_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r5_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r6_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r6_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r7_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r7_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r8_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r8_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r9_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r9_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r10_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r10_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r11_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r11_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['a_r12_tko_odd']; ?></td>
            <td valign="middle" style="color:grey;"><?php echo $value['b_r12_tko_odd']; ?></td>
            <td><a href="updatecontest.php?ctId=<?php echo $value['contestid']; ?>"><button class="btn btn-primary">Update</button></a></td>
            <td><button class="btn btn-danger">Delete</button></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?php else : ?>
        <div style="background-color:red;">You don't have any stake available.</div>
    <?php endif; ?>
</div><br><br><br>

<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/updatecontest.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#stakes').DataTable();
});
</script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>