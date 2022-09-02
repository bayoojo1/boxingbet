<?php
//Index page
require_once __DIR__ . '/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

$contests = new Contest();
$contesters = $contests->getAllUpcomingContest();
$contesters = json_decode($contesters, true);

$wins = $contests->getAllWins();
$wins = json_decode($wins, true);

$tickets = $contests->getTicket();
$tickets = json_decode($tickets, true);

$awards = new Awards();
$showAwards = $awards->getAllAwards();
$showAwards = json_decode($showAwards, true);


$users = new User();
$payment = new Payment();
?> 
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="padding-bottom:50px;">
    <div class="container" data-aos="fade-in">
      <h1>Welcome to Dcolossus</h1>
      <h2>Think &amp; Act</h2>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <a href="stakebet.php" class="btn-get-started scrollto">Stake a Bet</a>
      </div>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <a href="index.php#portfolio" class="btn-get-started scrollto">Cast a vote</a>
      </div>
      <div class="d-flex align-items-center">
        <i class="bx bxs-right-arrow-alt get-started-icon"></i>
        <a href="ticketing.php" class="btn-get-started scrollto">Purchase ticket</a>
      </div>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-xl-6 col-lg-5" data-aos="fade-up">
            <div class="content">
              <h3>Previous Results</h3>           
              <?php if(!empty($wins) && (is_array($wins))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:#ff5821; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Contester A</th>
                        <th>Contester B</th>
                        <th>Result</th>
<!--                        <th>Odd</th>-->
                        <th>Event Date</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($wins as $win) : ?> 
                    <?php foreach($win as $index => $value) : ?>
                    <?php 
                        $contesterA = $contests->getContesterName($value['contester_a']);
                        $contesterA = json_decode($contesterA, true);
                        $contesterB = $contests->getContesterName($value['contester_b']);
                        $contesterB = json_decode($contesterB, true);
                        $contestResult = $contests->getReadableContestResult($value['contest_result']);
                        $contestResult = json_decode($contestResult, true);
                    ?>
                <tr>
                    <td style="color:white;"><?php echo $contesterA[0]['alias']; ?></td>
                    <td style="color:white;"><?php echo $contesterB[0]['alias']; ?></td>
                    <td style="color:white;"><?php echo $contestResult[0]['value']; ?></td>
                    <td style="color:white;"><?php echo date("F jS, Y", strtotime($value['event_date'])); ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php elseif (count($win) == 0) : ?>
                <div style="background-color:red;">There's currently no result.</div>
            <?php endif; ?>
                <div id="seemore"><a href="showallwins.php" style="color:white; float:right;">See more...</a></div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-7 d-flex justify-content-center">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-10 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-calendar-event"></i>
                    <h4>Purchase Event Ticket</h4>
                      <?php if(!empty($tickets) && (is_array($tickets))) : ?>
                        <p>Hurray! Boxing events available</p>
                      <a href="ticketing.php"><button type="button" class="btn btn-danger" style="background-color:black; color:white;">Purchase Ticket</button></a>
                      <?php else : ?>
                      <p>No upcoming event.</p>
                      <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->

<main id="main">
<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
<div class="section-title">
<h2 data-aos="fade-up" style="color:white;">Up Coming Events</h2>
</div>
  <div class="container position-relative" data-aos="fade-up">
    <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
        <?php if(!empty($contesters) && (is_array($contesters))) : ?>
          <?php foreach($contesters as $contester) : ?> 
            <?php foreach($contester as $index => $value) : ?>
                <?php 
                    $contesterA = $users->findUserById($value['contester_a']); 
                    $contesterA = json_decode($contesterA, true);
                    $promocode = $payment->promoCode($value['contester_a']);
                    $promocode = json_decode($promocode, true);
                    $fightName = $contests->showFightTitle($value['contestid']);
                    $fightName = json_decode($fightName, true);
                ?>
                <div class="swiper-slide fight">
                  <div class="testimonial-item fighter">
                    <img src="<?php echo isset($contesterA[0]['img_url'])? $contesterA[0]['img_url'] : "https://via.placeholder.com/600/09f/fff.png"; ?>" style="width:200px;" class="testimonial-img" alt="">
                    <h3><?php echo $contesterA[0]['alias']; ?></h3>
                    <h4><?php echo $contesterA[0]['fname']. ' '.$contesterA[0]['lname']; ?></h4>
                    <p>Weight: <?php echo $contesterA[0]['weight']; ?></p>
                    <p>Height: <?php echo $contesterA[0]['height']; ?></p>
                    <p>Stance: <?php echo $contesterA[0]['stance']; ?></p>
                    <p>Sex: <?php echo $contesterA[0]['sex']; ?></p>
                    <?php if(isset($promocode[0]['code'])) : ?>
                    <p>Promo Code: <?php echo $promocode[0]['code']; ?></p>
                    <?php endif; ?>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      <?php echo $contesterA[0]['aboutme']; ?>
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                  <div class="testimonial-item fighter">
                    <?php 
                      $contesterB = $users->findUserById($value['contester_b']); 
                      $contesterB = json_decode($contesterB, true);
                      $promocode = $payment->promoCode($value['contester_b']);
                      $promocode = json_decode($promocode, true);
                    ?>
                    <img src="<?php echo isset($contesterB[0]['img_url'])? $contesterB[0]['img_url'] : "https://via.placeholder.com/600/09f/fff.png"; ?>" style="width:200px;" class="testimonial-img" alt="">
                    <h3><?php echo $contesterB[0]['alias']; ?></h3>
                    <h4><?php echo $contesterB[0]['fname']. ' '.$contesterB[0]['lname']; ?></h4>
                    <p>Weight: <?php echo $contesterB[0]['weight']; ?></p>
                    <p>Height: <?php echo $contesterB[0]['height']; ?></p>
                    <p>Stance: <?php echo $contesterB[0]['stance']; ?></p>
                    <p>Sex: <?php echo $contesterB[0]['sex']; ?></p>
                    <?php if(isset($promocode[0]['code'])) : ?>
                    <p>Promo Code: <?php echo $promocode[0]['code']; ?></p>
                    <?php endif; ?>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      <?php echo $contesterB[0]['aboutme']; ?>
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                  <div class="testimonial-item fighter extra">
                    <?php if(isset($fightName[0]['fightname'])) : ?>
                        <p style="color:white; font-style:normal; font-weight:bold;">Fight Title: <?php echo $fightName[0]['fightname']; ?></p>
                    <?php endif; ?>
                    <p style="color:white; font-style:normal;"><?php echo $contesterA[0]['alias']. ' <span class="versus">vs</span> ' .$contesterB[0]['alias']; ?></p>
                    <p style="color:white; font-style:normal;">Venue: <?php echo $value['event_location']; ?></p>
                    <p style="color:white; font-style:normal;">Date &amp; Time: <?php echo date("F jS, Y g:i a", strtotime($value['event_date'])); ?></p>
                      <a href="stakebet.php"><input type="submit" name="submit" class="submit" value="Stake a Bet" style="background-color:black; color:white;"></a>
                  </div>
                </div>
            <?php endforeach; ?>
          <?php endforeach; ?>
        <?php else : ?>
          <div>Watch this space!</div>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
<!-- End Testimonials Section -->  

   

<!-- ======= Portfolio Section ======= -->
<?php if(!empty($showAwards) && (is_array($showAwards))) : ?>
<section id="portfolio" class="portfolio">
<div class="container">

<div class="section-title">
  <h2 data-aos="fade-up">Awards</h2>
  <p data-aos="fade-up">These are awards for various categories in fighting sport. You can vote for any of your favorites.</p>
</div>
    
<div class="row" data-aos="fade-up" data-aos-delay="100">
  <div class="col-lg-12 d-flex justify-content-center">
    <ul id="portfolio-flters">
      <li data-filter="*" class="filter-active">All</li>
      <li data-filter=".filter-2020">2020</li>
      <li data-filter=".filter-2021">2021</li>
      <li data-filter=".filter-2022">2022</li>
    </ul>
  </div>
</div>

<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
<?php foreach($showAwards as $showAward) : ?> 
    <?php foreach($showAward as $index => $value) : ?>
    <?php 
        $year = explode('-', $value['created_at'])[0];
        $category = $awards->getCategoryName($value['category_id']);
        $category = json_decode($category, true);
        $nominee1 = $awards->getNomineeName($value['nominee1_id']);
        $nominee1 = json_decode($nominee1, true);
        $nominee2 = $awards->getNomineeName($value['nominee2_id']);
        $nominee2 = json_decode($nominee2, true);
        $nominee3 = $awards->getNomineeName($value['nominee3_id']);
        $nominee3 = json_decode($nominee3, true);
        $nominee4 = $awards->getNomineeName($value['nominee4_id']);
        $nominee4 = json_decode($nominee4, true);
        $nominee5 = $awards->getNomineeName($value['nominee5_id']);
        $nominee5 = json_decode($nominee5, true);
        $sponsor = $awards->getSponsorName($value['sponsor_id']);
        $sponsor = json_decode($sponsor, true);
        $presenter = $awards->getPresenterName($value['presenter_id']);
        $presenter = json_decode($presenter, true);
        $endorser = $awards->getEndorserName($value['endorser_id']);
        $endorser = json_decode($endorser, true);
    
        //Display vote counts
        $voteCountN1 = $awards->showVotes($value['category_id'], $value['nominee1_id']);  
        $voteCountN1 = json_decode($voteCountN1, true);
        if(isset($value['nominee2_id'])) {
          $voteCountN2 = $awards->showVotes($value['category_id'], $value['nominee2_id']);  
          $voteCountN2 = json_decode($voteCountN2, true);
        }
        if(isset($value['nominee3_id'])) {
          $voteCountN3 = $awards->showVotes($value['category_id'], $value['nominee3_id']);  
          $voteCountN3 = json_decode($voteCountN3, true);
        }
        if(isset($value['nominee4_id'])) {
          $voteCountN4 = $awards->showVotes($value['category_id'], $value['nominee4_id']);  
          $voteCountN4 = json_decode($voteCountN4, true);
        }
        if(isset($value['nominee5_id'])) {
          $voteCountN5 = $awards->showVotes($value['category_id'], $value['nominee5_id']);  
          $voteCountN5 = json_decode($voteCountN5, true);
        }
    ?>
  <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $year; ?>">
    <img src="<?php echo $sponsor[0]['img_url']; ?>" class="img-fluid" alt="">
    
    <form method="post" action="vote.php">
        <input type="hidden" name="awardId" value="<?php echo $value['id'] ?>">
        <?php if($value['openOrclosed'] === 'open') : ?>
            <input type="submit" name="submit" class="btn details-link" value="Cast Your Vote" style="color:white;">
        <?php endif; ?>
    </form>
      
    <div class="portfolio-info" style="text-align:center;">
      <h4><?php echo $category[0]['name']; ?></h4>
    <?php if(isset($nominee1[0]['name'])) : ?>
      <p><span class="awardCard">1st Nominee:</span> <?php echo $nominee1[0]['name']; ?>
            <span class="badge" style="font-size:10px; color:red;"><?php echo $voteCountN1[0]['voteCount']; ?></span>  
      </p>
    <?php endif; ?>
    <?php if(isset($nominee2[0]['name'])) : ?>
      <p><span class="awardCard">2nd Nominee:</span> <?php echo $nominee2[0]['name']; ?>
            <span class="badge" style="font-size:10px; color:red;"><?php echo $voteCountN2[0]['voteCount']; ?></span>
      </p>
    <?php endif; ?>
    <?php if(isset($nominee3[0]['name'])) : ?>
      <p><span class="awardCard">3rd Nominee:</span> <?php echo $nominee3[0]['name']; ?>
            <span class="badge" style="font-size:10px; color:red;"><?php echo $voteCountN3[0]['voteCount']; ?></span>
      </p>
    <?php endif; ?>
    <?php if(isset($nominee4[0]['name'])) : ?>
      <p><span class="awardCard">4th Nominee:</span> <?php echo $nominee4[0]['name']; ?>
            <span class="badge" style="font-size:10px; color:red;"><?php echo $voteCountN4[0]['voteCount']; ?></span>  
      </p>
    <?php endif; ?>
    <?php if(isset($nominee5[0]['name'])) : ?>
      <p><span class="awardCard">5th Nominee:</span> <?php echo $nominee5[0]['name']; ?>
            <span class="badge" style="font-size:10px; color:red;"><?php echo $voteCountN5[0]['voteCount']; ?></span>
      </p>
    <?php endif; ?>
    
    </div>
  </div>
    <?php endforeach; ?>
<?php endforeach; ?>
</div>
</div>
</section><!-- End Portfolio Section -->  
<?php endif; ?>
    

</main><!-- End #main -->
<link href="assets/css/custom.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<!--footer.php here -->
<?php
include __DIR__ .'/templates/footer.php'; 
?>