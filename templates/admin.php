<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Admin Page</h2>
    </div>
      
    <div class="container mt-3" data-aos="fade-up" style="text-align:center; margin-bottom:80px;">
      <h2>Dashboard</h2>
      <div class="mt-4 p-5 bg-primary text-white rounded">
        <div class="d-flex justify-content-around mb-3">
            <div class="p-2 bg-info">Dashboard 1</div>
            <div class="p-2 bg-warning">Dashboard 2</div>
            <div class="p-2 bg-danger">Dashboard 3</div>
        </div>
      </div>
    </div>
      

    <div class="row">
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-briefcase"></i></div>
          <h4 class="title"><a href="">Contests</a></h4>
          <?php if(!empty($getcontests) && (is_array($getcontests))) : ?>
                <div style="overflow-x:auto;">
                <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                    <thead style="background-color:#ff5821;">
                        <tr style="font-size:12px; font-weight:bold;">
                            <th>Contest ID</th>
                            <th>Contester A</th>
                            <th>Contester B</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php foreach($getcontests as $getcontest) : ?> 
                        <?php foreach($getcontest as $index => $value) : ?>
                    <tr>
                        <td style="color:white;"><?php echo $value['contestid']; ?></td>
                        <td style="color:white;"><?php echo $value['contester_a']; ?></td>
                        <td style="color:white;"><?php echo $value['contester_b']; ?></td>
                        <td style="color:white;"><?php echo date("F jS, Y", strtotime($value['created_at'])); ?></td>
                    </tr>
                       <?php endforeach; ?>
                  <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php else : ?>
                    <div style="background-color:red;">You don't have any stake available.</div>
                <?php endif; ?>
                <?php if(count($getcontest) > 1) : ?>
                    <div id="seemore"><a href="listcontests.php">See more...</a></div>
                <?php endif; ?>
            </div>
          </div>
        
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-card-checklist"></i></div>
          <h4 class="title"><a href="">Stakes</a></h4>
          <?php if(!empty($limitedStakes) && (is_array($limitedStakes))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Contest ID</th>
                        <th>Possibility</th>
                        <th>Odd</th>
                        <th>Stake</th>
                        <th>Player</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($limitedStakes as $limitedStake) : ?> 
                    <?php foreach($limitedStake as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['contestid']; ?></td>
                    <td style="color:white;"><?php echo $value['possibility']; ?></td>
                    <td style="color:white;"><?php echo $value['odd']; ?></td>
                    <td style="color:white;"><?php echo '&#8358;'.number_format((float)$value['stake'], 2, '.', ','); ?></td>
                    <td style="color:white;"><?php echo $value['userid']; ?></td>
                    <td style="color:white;"><?php echo date("F jS, Y", strtotime($value['created_at'])); ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">You don't have any stake available.</div>
            <?php endif; ?>
            <?php if(count($limitedStake) > 1) : ?>
                <div id="seemore"><a href="allstakes.php">See more...</a></div>
            <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-bar-chart"></i></div>
          <h4 class="title"><a href="">Users</a></h4>
          <?php if(!empty($allUsers) && (is_array($allUsers))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Type</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($allUsers as $allUser) : ?> 
                    <?php foreach($allUser as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['userid']; ?></td>
                    <?php if(isset($value['email'])) : ?>
                        <td style="color:white;"><?php echo $value['email']; ?></td>
                    <?php else : ?>
                        <td style="color:white;"><?php echo $value['myemail']; ?></td>
                    <?php endif; ?>
                    <?php if(isset($value['mobile'])) : ?>
                        <td style="color:white;"><?php echo $value['mobile']; ?></td>
                    <?php else : ?>
                        <td style="color:white;"><?php echo $value['mymobile']; ?></td>
                    <?php endif; ?>
                    <td style="color:white;"><?php echo $value['fname']; ?></td>
                    <td style="color:white;"><?php echo $value['lname']; ?></td>
                    <?php
                        $userType = '';
                        if($value['role_id'] == '1') {
                            $userType = 'Admin';
                        } else if($value['role_id'] == '2') {
                            $userType = 'Boxer';
                        } else if($value['role_id'] == '3') {
                            $userType = 'User';
                        } else if($value['role_id'] == '4') {
                            $userType = 'Agent';
                        } else {
                            $userType = 'Manager';
                        }
                    ?>
                    <td style="color:white;"><?php echo $userType; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">You don't have any stake available.</div>
            <?php endif; ?>
            <?php if(count($allUser) > 1) : ?>
                <div id="seemore"><a href="allusers.php">See more...</a></div>
            <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Wins</a></h4>
          <?php if(!empty($wins) && (is_array($wins))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Contest ID</th>
                        <th>Contester A</th>
                        <th>Contester B</th>
                        <th>Result</th>
                        <th>Odd</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($wins as $win) : ?> 
                    <?php foreach($win as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['contestid']; ?></td>
                    <td style="color:white;"><?php echo $value['contester_a']; ?></td>
                    <td style="color:white;"><?php echo $value['contester_b']; ?></td>
                    <td style="color:white;"><?php echo $value['contest_result']; ?></td>
                    <td style="color:white;"><?php echo $value['odd']; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">You don't have any stake available.</div>
            <?php endif; ?>
            <?php if(count($win) > 1) : ?>
                <div id="seemore"><a href="allwins.php">See more...</a></div>
            <?php endif; ?>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Tickets Generation</a></h4>
          <?php if(!empty($upcomings) && (is_array($upcomings))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Contest ID</th>
                        <th>Contester A</th>
                        <th>Contester B</th>
                        <th>Event Date</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($upcomings as $upcoming) : ?> 
                    <?php foreach($upcoming as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['contestid']; ?></td>
                    <td style="color:white;"><?php echo $value['contester_a']; ?></td>
                    <td style="color:white;"><?php echo $value['contester_b']; ?></td>
                    <td style="color:white;"><?php echo date("F jS, Y", strtotime($value['event_date'])); ?></td>
                    <td style="color:white;"><?php echo $value['event_location']; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No upcoming Event.</div>
            <?php endif; ?>
            <?php if(count($upcoming) > 1) : ?>
                <div id="seemore"><a href="upcoming.php">See more...</a></div>
            <?php endif; ?>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Tickets Purchase</a></h4>
          <?php if(!empty($ticketspurchase) && (is_array($ticketspurchase))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Fight Name</th>
                        <th>Ticket Type</th>
                        <th>Pass Code</th>
                        <th>Cost</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($ticketspurchase as $ticketpurchase) : ?> 
                    <?php foreach($ticketpurchase as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['fightname']; ?></td>
                    <td style="color:white;"><?php echo $value['ticket_type']; ?></td>
                    <td style="color:white;"><?php echo $value['event_code']; ?></td>
                    <td style="color:white;"><?php echo '&#8358;'.number_format((float)$value['price'], 2, '.', ','); ?></td>
                    <td style="color:white;"><?php echo date("F jS, Y", strtotime($value['created_at'])); ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No upcoming Event.</div>
            <?php endif; ?>
            <?php if(count($ticketpurchase) > 1) : ?>
                <div id="seemore"><a href="alltickets.php">See more...</a></div>
            <?php endif; ?>
        </div>
        </div> 
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Boxers' Promo Code</a></h4>
          <?php if(!empty($limitboxers) && (is_array($limitboxers))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Boxer Alias</th>
                        <th>Boxer Name</th>
                        <th>Promo Code</th>
                        <th>Discount</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($limitboxers as $limitboxer) : ?> 
                    <?php foreach($limitboxer as $index => $value) : ?>
                <tr>
                    <?php 
                        $promo = $payment->promoCode($value['userid']);
                        $promo = json_decode($promo, true);
                    ?>
                    <td style="color:white;"><?php echo $value['alias']; ?></td>
                    <td style="color:white;"><?php echo $value['fname'].' '.$value['lname']; ?></td>
                    <td style="color:white;"><?php echo $promo[0]['code']; ?></td>
                    <td style="color:white;"><?php echo $promo[0]['discount'].'%'; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No promo code.</div>
            <?php endif; ?>
            <?php if(count($limitboxer) > 1) : ?>
                <div id="seemore"><a href="promocode.php">See more...</a></div>
            <?php endif; ?>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Withdraw Requests</a></h4>
          <?php if(!empty($withrawrequests) && (is_array($withrawrequests))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>User</th>
                        <th>Bank Name</th>
                        <th>Bank Account</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($withrawrequests as $withrawrequest) : ?> 
                    <?php foreach($withrawrequest as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['userid']; ?></td>
                    <td style="color:white;"><?php echo $value['bank_name']; ?></td>
                    <td style="color:white;"><?php echo $value['bank_account']; ?></td>
                    <td style="color:white;"><?php echo '&#8358;'.number_format((float)$value['amount'], 2, '.', ','); ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No Pending Request.</div>
            <?php endif; ?>
            <?php if(count($withrawrequest) > 1) : ?>
                <div id="seemore"><a href="allrequests.php">See more...</a></div>
            <?php endif; ?>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Award Categories</a></h4>
          <?php if(!empty($limitedCategories) && (is_array($limitedCategories))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Category Name</th>
                        <th>Category Description</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($limitedCategories as $limitedCategory) : ?> 
                    <?php foreach($limitedCategory as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['name']; ?></td>
                    <td style="color:white;"><?php echo $value['description']; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No Category.</div>
            <?php endif; ?>
            <div id="seemore"><a href="awardcategories.php">Edit Category</a></div>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Award Nominees</a></h4>
          <?php if(!empty($nominees) && (is_array($nominees))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Nominee Name</th>
                        <th>Nominee Mobile</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($nominees as $nominee) : ?> 
                    <?php foreach($nominee as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['name']; ?></td>
                    <td style="color:white;"><?php echo $value['mobile']; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No Nominee.</div>
            <?php endif; ?>
            <div id="seemore"><a href="allnominees.php">Edit Nominee</a></div>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Award Sponsor</a></h4>
          <?php if(!empty($sponsors) && (is_array($sponsors))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Sponsor Name</th>
                        <th>Sponsor Mobile</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($sponsors as $sponsor) : ?> 
                    <?php foreach($sponsor as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['name']; ?></td>
                    <td style="color:white;"><?php echo $value['mobile']; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No Sponsor.</div>
            <?php endif; ?>
            <div id="seemore"><a href="allsponsors.php">Edit Sponsor</a></div>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Award Presenter</a></h4>
          <?php if(!empty($presenters) && (is_array($presenters))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Presenter Name</th>
                        <th>Presenter Mobile</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($presenters as $presenter) : ?> 
                    <?php foreach($presenter as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['name']; ?></td>
                    <td style="color:white;"><?php echo $value['mobile']; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No Presenter.</div>
            <?php endif; ?>
            <div id="seemore"><a href="allpresenters.php">Edit Presenter</a></div>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Award Endorser</a></h4>
          <?php if(!empty($endorsers) && (is_array($endorsers))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Endorser Name</th>
                        <th>Endorser Mobile</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($endorsers as $endorser) : ?> 
                    <?php foreach($endorser as $index => $value) : ?>
                <tr>
                    <td style="color:white;"><?php echo $value['name']; ?></td>
                    <td style="color:white;"><?php echo $value['mobile']; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red;">No Endorser.</div>
            <?php endif; ?>
            <div id="seemore"><a href="allendorsers.php">Edit Endorser</a></div>
        </div>
        </div>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bi bi-binoculars"></i></div>
          <h4 class="title"><a href="">Awards</a></h4>
          <?php if(!empty($limitedAwards) && (is_array($limitedAwards))) : ?>
            <div style="overflow-x:auto;">
            <table id="stakes" class="table table-striped" style="width:100%; background-color:black; color:white; font-size:12px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th>Award Category</th>
                        <th>Award Nominee</th>
                    </tr>
                </thead>
                <tbody>
              <?php foreach($limitedAwards as $limitedAward) : ?> 
                    <?php foreach($limitedAward as $index => $value) : ?>
                    <?php
                        $categoryName = $awards->getCategoryName($value['category_id']);
                        $categoryName = json_decode($categoryName, true);
                        $nomineeName = $awards->getNomineeName($value['nominee1_id']);
                        $nomineeName = json_decode($nomineeName, true);
                    ?>  
                <tr>
                    <td style="color:white;"><?php echo $categoryName[0]['name']; ?></td>
                    <td style="color:white;"><?php echo $nomineeName[0]['name']; ?></td>
                </tr>
                   <?php endforeach; ?>
              <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <?php else : ?>
                <div style="background-color:red; color:white;">No Award.</div>
            <?php endif; ?>
            <div id="seemore"><a href="allawards.php">Edit Award</a></div>
        </div>
        </div>
        
    </div>
    </div>
</section><!-- End Services Section --> 
<link href="assets/css/custom.css" rel="stylesheet">

<?php
include 'footer.php'; 
?>