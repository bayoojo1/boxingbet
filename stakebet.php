<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';


$contests = new Contest();
$allcontests = $contests->getAllUpcomingContest();
$allcontests = json_decode($allcontests, true);

?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">Stake a Bet</h2>
      <p data-aos="fade-up">You can stake a bet on any or all the below upcoming contests</p>
    </div>
    <?php if(!empty($allcontests) && (is_array($allcontests))) : ?>
    <div style="overflow-x:auto;">
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:10px; font-weight:bold;">
                <th valign="middle">Contester A</th>
                <th valign="middle">Contester B</th>
                <th valign="middle">Fight Name</th>
                <th valign="middle">A wins B</th>
                <th valign="middle">B wins A</th>
                <th valign="middle">A wins tko</th>
                <th valign="middle">B wins tko</th>
                <th valign="middle">A wins split</th>
                <th valign="middle">B wins split</th>
                <th valign="middle">A wins unanimously</th>
                <th valign="middle">B wins unanimously</th>
                <th valign="middle">Draw</th>
                <th valign="middle">A wins round 1 tko</th>
                <th valign="middle">B wins round 1 tko</th>
                <th valign="middle">A wins round 2 tko</th>
                <th valign="middle">B wins round 2 tko</th>
                <th valign="middle">A wins round 3 tko</th>
                <th valign="middle">B wins round 3 tko</th>
                <th valign="middle">A wins round 4 tko</th>
                <th valign="middle">B wins round 4 tko</th>
                <th valign="middle">A wins round 5 tko</th>
                <th valign="middle">B wins round 5 tko</th>
                <th valign="middle">A wins round 6 tko</th>
                <th valign="middle">B wins round 6 tko</th>
                <th valign="middle">A wins round 7 tko</th>
                <th valign="middle">B wins round 7 tko</th>
                <th valign="middle">A wins round 8 tko</th>
                <th valign="middle">B wins round 8 tko</th>
                <th valign="middle">A wins round 9 tko</th>
                <th valign="middle">B wins round 9 tko</th>
                <th valign="middle">A wins round 10 tko</th>
                <th valign="middle">B wins round 10 tko</th>
                <th valign="middle">A wins round 11 tko</th>
                <th valign="middle">B wins round 11 tko</th>
                <th valign="middle">A wins round 12 tko</th>
                <th valign="middle">B wins round 12 tko</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($allcontests as $allcontest) : ?> 
            <?php foreach($allcontest as $index => $value) : ?>
            <?php 
                $contesterA = $contests->getContesterName($value['contester_a']);
                $contesterA = json_decode($contesterA, true);
                $contesterB = $contests->getContesterName($value['contester_b']);
                $contesterB = json_decode($contesterB, true);
                // Get fight name
                $fightname = $contests->getPricedEvents($value['contestid']);
                $fightname = json_decode($fightname, true);
            ?>
        <tr>
            <td valign="middle" style="color:grey;"><a href="profile.php?u=<?php echo $value['contester_a']; ?>"><img class="betImg" style="width:40px; height:40px;" src="<?php echo $contesterA[0]['img_url']; ?>"><br><?php echo $contesterA[0]['alias']; ?></a></td>
            <td valign="middle" style="color:grey;"><a href="profile.php?u=<?php echo $value['contester_b']; ?>"><img class="betImg" style="width:40px; height:40px;" src="<?php echo $contesterB[0]['img_url']; ?>"><br><?php echo $contesterB[0]['alias']; ?></a></td>
            <?php if(isset($fightname[0]['fightname'])) : ?>
                <td valign="middle" style="color:grey;"><?php echo $fightname[0]['fightname']; ?></td>
            <?php else : ?>
                <td valign="middle" style="color:grey;">-</td>
            <?php endif; ?>
            <td valign="middle" style="color:grey;"><?php echo $value['a_wins_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_wins_odd-<?php echo $value['contestid']; ?>" value="a_wins_odd-<?php echo $value['a_wins_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_wins_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_wins_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_wins_odd-<?php echo $value['contestid']; ?>" value="b_wins_odd-<?php echo $value['b_wins_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_wins_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_wins_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_wins_tko_odd-<?php echo $value['contestid']; ?>" value="a_wins_tko_odd-<?php echo $value['a_wins_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_wins_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_wins_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_wins_tko_odd-<?php echo $value['contestid']; ?>" value="b_wins_tko_odd-<?php echo $value['b_wins_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_wins_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_wins_split_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_wins_split_odd-<?php echo $value['contestid']; ?>" value="a_wins_split_odd-<?php echo $value['a_wins_split_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_wins_split_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_wins_split_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_wins_split_odd-<?php echo $value['contestid']; ?>" value="b_wins_split_odd-<?php echo $value['b_wins_split_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_wins_split_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_wins_unanimous_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_wins_unanimous_odd-<?php echo $value['contestid']; ?>" value="a_wins_unanimous_odd-<?php echo $value['a_wins_unanimous_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_wins_unanimous_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_wins_unanimous_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_wins_unanimous_odd-<?php echo $value['contestid']; ?>" value="b_wins_unanimous_odd-<?php echo $value['b_wins_unanimous_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_wins_unanimous_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['draw_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-draw_odd-<?php echo $value['contestid']; ?>" value="draw_odd-<?php echo $value['draw_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['draw_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r1_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r1_tko_odd-<?php echo $value['contestid']; ?>" value="a_r1_tko_odd-<?php echo $value['a_r1_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r1_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r1_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r1_tko_odd-<?php echo $value['contestid']; ?>" value="b_r1_tko_odd-<?php echo $value['b_r1_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r1_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r2_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r2_tko_odd-<?php echo $value['contestid']; ?>" value="a_r2_tko_odd-<?php echo $value['a_r2_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r2_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r2_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r2_tko_odd-<?php echo $value['contestid']; ?>" value="b_r2_tko_odd-<?php echo $value['b_r2_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r2_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r3_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r3_tko_odd-<?php echo $value['contestid']; ?>" value="a_r3_tko_odd-<?php echo $value['a_r3_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r3_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r3_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r3_tko_odd-<?php echo $value['contestid']; ?>" value="b_r3_tko_odd-<?php echo $value['b_r3_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r3_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r4_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r4_tko_odd-<?php echo $value['contestid']; ?>" value="a_r4_tko_odd-<?php echo $value['a_r4_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r4_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r4_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r4_tko_odd-<?php echo $value['contestid']; ?>" value="b_r4_tko_odd-<?php echo $value['b_r4_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r4_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r5_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r5_tko_odd-<?php echo $value['contestid']; ?>" value="a_r5_tko_odd-<?php echo $value['a_r5_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r5_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r5_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r5_tko_odd-<?php echo $value['contestid']; ?>" value="b_r5_tko_odd-<?php echo $value['b_r5_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r5_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r6_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r6_tko_odd-<?php echo $value['contestid']; ?>" value="a_r6_tko_odd-<?php echo $value['a_r6_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r6_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r6_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r6_tko_odd-<?php echo $value['contestid']; ?>" value="b_r6_tko_odd-<?php echo $value['b_r6_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r6_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r7_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r7_tko_odd-<?php echo $value['contestid']; ?>" value="a_r7_tko_odd-<?php echo $value['a_r7_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r7_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r7_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r7_tko_odd-<?php echo $value['contestid']; ?>" value="b_r7_tko_odd-<?php echo $value['b_r7_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r7_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r8_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r8_tko_odd-<?php echo $value['contestid']; ?>" value="a_r8_tko_odd-<?php echo $value['a_r8_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r8_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r8_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r8_tko_odd-<?php echo $value['contestid']; ?>" value="b_r8_tko_odd-<?php echo $value['b_r8_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r8_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r9_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r9_tko_odd-<?php echo $value['contestid']; ?>" value="a_r9_tko_odd-<?php echo $value['a_r9_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r9_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r9_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r9_tko_odd-<?php echo $value['contestid']; ?>" value="b_r9_tko_odd-<?php echo $value['b_r9_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r9_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r10_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r10_tko_odd-<?php echo $value['contestid']; ?>" value="a_r10_tko_odd-<?php echo $value['a_r10_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r10_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r10_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r10_tko_odd-<?php echo $value['contestid']; ?>" value="b_r10_tko_odd-<?php echo $value['b_r10_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r10_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r11_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r11_tko_odd-<?php echo $value['contestid']; ?>" value="a_r11_tko_odd-<?php echo $value['a_r11_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r11_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r11_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r11_tko_odd-<?php echo $value['contestid']; ?>" value="b_r11_tko_odd-<?php echo $value['b_r11_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r11_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['a_r12_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-a_r12_tko_odd-<?php echo $value['contestid']; ?>" value="a_r12_tko_odd-<?php echo $value['a_r12_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['a_r12_tko_odd'])) echo 'disabled'; ?>></td>
            
            <td valign="middle" style="color:grey;"><?php echo $value['b_r12_tko_odd']; ?> <input type="radio" name="<?php echo $value['contestid']; ?>" id="stake-b_r12_tko_odd-<?php echo $value['contestid']; ?>" value="b_r12_tko_odd-<?php echo $value['b_r12_tko_odd'].'-'.$value['contestid']; ?>" <?php if(empty($value['b_r12_tko_odd'])) echo 'disabled'; ?>></td>
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
<form method="post" action="submitstaking.php">
    <div style="text-align:center; margin-bottom:50px;">
      <div id="stakelist" style="margin-bottom:30px;"></div> 
        <input type="text" name="amount" id="amount" placeholder="Enter your stake here..." required="required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');">
        <input type="submit" class="btn btn-dark" id="calculate" value="Calculate">
        <br><br>
        <input type="hidden" id="clickedId" name="clickedId">
        <input type="submit" class="btn btn-dark" name="submit" id="submitStakes" value="Submit">
    </div>
</form>

<link href="assets/css/custom.css" rel="stylesheet">
<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/stakelist.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#stakes').DataTable();
});
</script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>