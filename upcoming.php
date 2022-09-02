<?php
require_once __DIR__ . '/inc/bootstrap.php';
$isAuth = new UserAuth();
$isAuth->requireAuth();
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';


$contests = new Contest();
$upcomings = $contests->getAllUpcomingContest();
$upcomings = json_decode($upcomings, true);

$fightnames = $contests->getPricedEvents();
$fightnames = json_decode($fightnames, true);
?>
<br><br><br>
<div class="container">
    <div class="section-title">
      <h2 data-aos="fade-up">All Upcoming Events</h2>
      <p data-aos="fade-up">This shows all upcoming events.</p>
    </div>

    <?php if(!empty($upcomings) && (is_array($upcomings))) : ?>
    <div style="overflow-x:auto;">
    <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:12px;">
        <thead style="background-color:#ff5821;">
            <tr style="font-size:12px; font-weight:bold;">
                <th>Contest ID</th>
                <th>Contester A</th>
                <th>Contester B</th>
                <th>Event Date</th>
                <th>Location</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
      <?php foreach($upcomings as $upcoming) : ?> 
            <?php foreach($upcoming as $index => $value) : ?>
            <?php 
                $contesterA = $contests->getContesterName($value['contester_a']);
                $contesterA = json_decode($contesterA, true);
                $contesterB = $contests->getContesterName($value['contester_b']);
                $contesterB = json_decode($contesterB, true);
                $checked = $contests->getPricedEvents($value['contestid']);
                $checked = json_decode($checked, true);
            ?>
        <tr>
            <td style="color:grey;"><?php echo $value['contestid']; ?></td>
            <td style="color:grey;"><?php echo $contesterA[0]['alias']; ?></td>
            <td style="color:grey;"><?php echo $contesterB[0]['alias']; ?></td>
            <td style="color:grey;"><?php echo date("F jS, Y", strtotime($value['event_date'])); ?></td>
            <td style="color:grey;"><?php echo $value['event_location']; ?></td>
            <td style="color:grey;"><input type="checkbox" name="contestid" value="<?php echo $value['contestid']; ?>" <?php if(!empty($checked[0]['contestid'])) echo 'disabled';?>></td>
        </tr>
           <?php endforeach; ?>
      <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?php else : ?>
        <div style="background-color:red;">No upcoming event.</div>
    <?php endif; ?>
    <div class="" style="text-align:center; margin-top:100px;" data-aos="fade-up">
        <h1>Event Ticket Setting</h1>
        <p>ADD NEW CONTEST TO AN EXISTING TICKET</p>
        <p>Select an event or a group of events above, chose the fight name below and submit</p>
        
        <div class="form-group mt-3 text-center" style="margin-bottom:30px;">
            <?php if(!empty($fightnames) && (is_array($fightnames))) : ?>
            <select name="ftname" id="ftname">
                <option selected>Select a fight name</option>
                <?php foreach($fightnames as $fightname) : ?>
                    <?php foreach($fightname as $index => $value) : ?>
                    <option value="<?php echo $value['eventid']; ?>"><?php echo $value['fightname']; ?></option>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>
            <?php endif; ?>
            <input type="button" value="Submit" id="addContest">
        </div> 
        <h5>OR</h5>
        <p style="margin-top:30px;">CREATE A NEW TICKET</p>
        <p>Select an event or a group of events above, and set the fight name and ticket price.</p>
        <input type="text" id="fightname" name="fightname" placeholder="Fight Name" oninput="this.value = this.value.replace(/[^a-zA-Z. ]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
        <br><br>
        <input type="text" id="regular" name="regular" placeholder="Regular" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
        <br><br>
        <input type="text" id="vip" name="vip" placeholder="VIP" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
        <br><br>
        <input type="text" id="vvip" name="vvip" placeholder="VVIP" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required="required">
        <br><br>
        <input type="button" value="Submit" id="priceBtn">
    </div>
</div><br><br><br>

<link href="assets/css/table.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script src="js/eventprice.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>

<script>
    $(document).ready( function () {
    $('#stakes').DataTable();
});
</script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>
            