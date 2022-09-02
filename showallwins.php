<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$contests = new Contest();
$allwins = $contests->showAllWins();
$allwins = json_decode($allwins, true);
?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">Previous Results</h2>
      <p data-aos="fade-up">This shows all previous results.</p>
    </div>

    <?php if(!empty($allwins) && (is_array($allwins))) : ?>
    <table id="wins" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Contester A</th>
                <th>Contester B</th>
                <th>Fight Name</th>
                <th>Result</th>
                <th>Event Date</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($allwins as $allwin) : ?> 
            <?php foreach($allwin as $index => $value) : ?>
            <?php 
                $contesterA = $contests->getContesterName($value['contester_a']);
                $contesterA = json_decode($contesterA, true);
                $contesterB = $contests->getContesterName($value['contester_b']);
                $contesterB = json_decode($contesterB, true);
                $contestResult = $contests->getReadableContestResult($value['contest_result']);
                $contestResult = json_decode($contestResult, true);
                // Get fight name
                $fightname = $contests->getPricedEvents($value['contestid']);
                $fightname = json_decode($fightname, true);
            ?>
            <tr>
                <td style="color:grey;"><?php echo $contesterA[0]['alias']; ?></td>
                <td style="color:grey;"><?php echo $contesterB[0]['alias']; ?></td>
                <td style="color:grey;"><?php echo $fightname[0]['fightname']; ?></td>
                <td style="color:grey;"><?php echo $contestResult[0]['value']; ?></td>
                <td style="color:grey;"><?php echo date("F jS, Y", strtotime($value['event_date'])); ?></td>
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
            