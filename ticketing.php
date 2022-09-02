<?php
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';


$contests = new Contest();
$tickets = $contests->getTicket(); 
$tickets = json_decode($tickets, true);

?>
<br><br><br>
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
  <div class="container">

    <div class="section-title">
      <h2 data-aos="fade-up">Tikcet</h2>
      <p data-aos="fade-up">Purchase your ticket for all upcoming boxing events</p>
    </div>

    <div class="row justify-content-center">
    <?php if(!empty($tickets) && (is_array($tickets))) : ?>
        <?php foreach($tickets as $ticket) : ?> 
            <?php foreach($ticket as $index => $value) : ?>
                <?php
                    $thisContest = $contests->getAllContest($value['contestid']);
                    $thisContest = json_decode($thisContest, true);
                    $contesterA = $thisContest[0]['contester_a'];
                    $contesterB = $thisContest[0]['contester_b'];
                    $contesterAalias = $contests->getContesterName($contesterA);
                    $contesterAalias = json_decode($contesterAalias, true);
                    $contesterBalias = $contests->getContesterName($contesterB);
                    $contesterBalias = json_decode($contesterBalias, true);
                ?>
              <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="100">
                <form method="post" action="ticketpurchase.php">
                <div class="box featured">
                  <h3>
                      <p>Location: <?php echo $thisContest[0]['event_location']; ?></p>
                      <p>Date: <?php echo date("F jS, Y g:i a", strtotime($thisContest[0]['event_date'])); ?></p>
                      <p>Fight Title: <?php echo $value['fightname']; ?></p>
                  </h3>
                    <label for="regular-<?php echo $value['eventid'].'-'.$value['regular']; ?>"><h5>Regular</h5></label> 
                    <input id="regular-<?php echo $value['eventid'].'-'.$value['regular']; ?>" type="radio" name="ticket" value="regular-<?php echo $value['eventid'].'-'.$value['regular'].'-'.$value['fightname']; ?>" required="required"><br>
                    
                    <h4><label for="regular-<?php echo $value['eventid'].'-'.$value['regular']; ?>"><?php echo '&#8358;'.number_format((float)$value['regular'], 2, '.', ','); ?><span> / Regular</span></label></h4>
                    
                    <label for="vip-<?php echo $value['eventid'].'-'.$value['vip']; ?>"><h5>VIP</h5></label> 
                    <input id="vip-<?php echo $value['eventid'].'-'.$value['vip']; ?>" type="radio" name="ticket" value="vip-<?php echo $value['eventid'].'-'.$value['vip'].'-'.$value['fightname']; ?>" required="required"><br>
                    
                    <h4><label for="vip-<?php echo $value['eventid'].'-'.$value['vip']; ?>"><?php echo '&#8358;'.number_format((float)$value['vip'], 2, '.', ','); ?><span> / VIP</span></label></h4>
                    
                    <label for="vvip-<?php echo $value['eventid'].'-'.$value['vvip']; ?>"><h5>VVIP</h5></label>
                    <input id="vvip-<?php echo $value['eventid'].'-'.$value['vvip']; ?>" type="radio" name="ticket" value="vvip-<?php echo $value['eventid'].'-'.$value['vvip'].'-'.$value['fightname']; ?>" required="required">
                    
                    <h4><label for="vvip-<?php echo $value['eventid'].'-'.$value['vvip']; ?>"><?php echo '&#8358;'.number_format((float)$value['vvip'], 2, '.', ','); ?><span> / VVIP</span></label></h4>
                    
                    <div class="btn-wrap">
                    <input class="btn btn-buy" id="submit" type="submit" name="submit" value="Post">
                  </div>
                </div>
                </form>
              </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    <?php endif; ?>
    </div>
  </div>
</section><!-- End Pricing Section -->

<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/eventprice.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>