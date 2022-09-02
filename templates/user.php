<!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>My Profile</h2>
        </div>

        <div class="row">
        <!--See this page only if you are the page owner or an admin -->
          <div class="row justify-content-center align-items-center">
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="member">
              <div class="member-img">
                <?php if(isset($user[0]['img_url'])) : ?>
                    <img src="<?php echo $user[0]['img_url']; ?>" class="img-fluid" alt="">
                <?php else : ?>
                    <img src="https://via.placeholder.com/600/09f/fff.png" class="img-fluid" alt="">
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <?php if(($userRoles->isOwner($user[0]['userid']) && $userRoles->isBoxer()) || ($userRoles->isAdmin() && !$userRoles->isOwner($user[0]['userid']))) : ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div id="myaccount" class="icon-box">
              <div class="icon"><i class="zmdi zmdi-account" style="font-size:32px;" title="Edit My Profile"></i></div>
              <h4 class="title"><a href="">My Account</a></h4>
              <ul>
                <?php if(isset($user[0]['mobile'])) : ?>
                    <li style="margin:0; padding:0.2em;">Mobile: <?php echo $user[0]['mobile']; ?></li>
                <?php else : ?>
                    <li style="margin:0; padding:0.2em;">Email: <?php echo $user[0]['email']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['fname'])) : ?>
                    <li style="margin:0; padding:0.2em;">First Name: <?php echo $user[0]['fname']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['lname'])) : ?>
                    <li style="margin:0; padding:0.2em;">Last Name: <?php echo $user[0]['lname']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['alias'])) : ?>
                    <li style="margin:0; padding:0.2em;">Alias: <?php echo $user[0]['alias']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['mymobile'])) : ?>
                    <li style="margin:0; padding:0.2em;">Mobile: <?php echo $user[0]['mymobile']; ?></li>
                <?php elseif(isset($user[0]['myemail'])) : ?>
                    <li style="margin:0; padding:0.2em;">Email: <?php echo $user[0]['myemail']; ?></li>
                <?php endif; ?>
                  <?php if(isset($user[0]['weight'])) : ?>
                    <li style="margin:0; padding:0.2em;">Weight: <?php echo $user[0]['weight']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['height'])) : ?>
                    <li style="margin:0; padding:0.2em;">Height: <?php echo $user[0]['height']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['stance'])) : ?>
                    <li style="margin:0; padding:0.2em;">Stance: <?php echo $user[0]['stance']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['club_name'])) : ?>
                    <li style="margin:0; padding:0.2em;">Club Name: <?php echo $user[0]['club_name']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['coach'])) : ?>
                    <li style="margin:0; padding:0.2em;">Coach: <?php echo $user[0]['coach']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['state'])) : ?>
                    <li style="margin:0; padding:0.2em;">State: <?php echo $user[0]['state']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['nationality'])) : ?>
                    <li style="margin:0; padding:0.2em;">Nationality: <?php echo $user[0]['nationality']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['age'])) : ?>
                    <li style="margin:0; padding:0.2em;">Age: <?php echo $user[0]['age']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['sex'])) : ?>
                    <li style="margin:0; padding:0.2em;">Sex: <?php echo $user[0]['sex']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($promocode[0]['code'])) : ?>
                    <li style="margin:0; padding:0.2em;">My Promo Code: <?php echo $promocode[0]['code']; ?></li>
                  <?php endif; ?>
                    <li style="margin:0; padding:0.2em;">My Wallet: 
                        <?php echo '&#8358;'.number_format((float)$wallet[0]['balance'], 2, '.', ','); ?>
                        <?php if($userRoles->isOwner($user[0]['userid'])) echo '<a href="managewallet.php">Manage Wallet</a>'; ?>
                    </li>
              </ul>
              <?php if($userRoles->isOwner($user[0]['userid'])) : ?>
                <div class="social">
                <a href="edit.php"><i class="zmdi zmdi-edit zmdi-hc-4x" style="font-size:26px;" title="Edit My Profile"></i></a>
                </div>
             <?php endif; ?>
            </div>
          </div>
        <?php else : ?>
            <!-- See this page if you are a user or an admin -->
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
            <div id="myaccount" class="icon-box">
              <div class="icon"><i class="zmdi zmdi-account" style="font-size:32px;" title="Edit My Profile"></i></div>
              <h4 class="title"><a href="">My Account</a></h4>
              <ul>
                <?php if(isset($user[0]['mobile'])) : ?>
                    <li style="margin:0; padding:0.2em;">Mobile: <?php echo $user[0]['mobile']; ?></li>
                <?php else : ?>
                    <li style="margin:0; padding:0.2em;">Email: <?php echo $user[0]['email']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['fname'])) : ?>
                    <li style="margin:0; padding:0.2em;">First Name: <?php echo $user[0]['fname']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['lname'])) : ?>
                    <li style="margin:0; padding:0.2em;">Last Name: <?php echo $user[0]['lname']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['alias'])) : ?>
                    <li style="margin:0; padding:0.2em;">Alias: <?php echo $user[0]['alias']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['mymobile'])) : ?>
                    <li style="margin:0; padding:0.2em;">Mobile: <?php echo $user[0]['mymobile']; ?></li>
                <?php elseif(isset($user[0]['myemail'])) : ?>
                    <li style="margin:0; padding:0.2em;">Email: <?php echo $user[0]['myemail']; ?></li>
                <?php endif; ?>
                <?php if(isset($user[0]['weight'])) : ?>
                    <li style="margin:0; padding:0.2em;">Weight: <?php echo $user[0]['weight']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['height'])) : ?>
                    <li style="margin:0; padding:0.2em;">Height: <?php echo $user[0]['height']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['stance'])) : ?>
                    <li style="margin:0; padding:0.2em;">Stance: <?php echo $user[0]['stance']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['club_name'])) : ?>
                    <li style="margin:0; padding:0.2em;">Club Name: <?php echo $user[0]['club_name']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['coach'])) : ?>
                    <li style="margin:0; padding:0.2em;">Coach: <?php echo $user[0]['coach']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['state'])) : ?>
                    <li style="margin:0; padding:0.2em;">State: <?php echo $user[0]['state']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['nationality'])) : ?>
                    <li style="margin:0; padding:0.2em;">Nationality: <?php echo $user[0]['nationality']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['age'])) : ?>
                    <li style="margin:0; padding:0.2em;">Age: <?php echo $user[0]['age']; ?></li>
                  <?php endif; ?>
                  <?php if(isset($user[0]['sex'])) : ?>
                    <li style="margin:0; padding:0.2em;">Sex: <?php echo $user[0]['sex']; ?></li>
                  <?php endif; ?>
                  <?php if($userRoles->isOwner($user[0]['userid']) || ($userRoles->isAdmin() && !$userRoles->isOwner($user[0]['userid']))) : ?>
                  <li style="margin:0; padding:0.2em;">My Wallet: 
                    <?php echo '&#8358;'.number_format((float)$wallet[0]['balance'], 2, '.', ','); ?>
                    <?php if($userRoles->isOwner($user[0]['userid'])) echo '<a href="managewallet.php">Manage Wallet</a>'; ?>
                </li>
                  <?php endif; ?>
                </ul>
                <?php if($userRoles->isOwner($user[0]['userid'])) : ?>
                <div class="social">
                <a href="edituser.php?u=<?php echo $user[0]['userid']; ?>"><i class="zmdi zmdi-edit zmdi-hc-4x" style="font-size:26px;" title="Edit My Profile"></i></a>
                </div>
             <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <!-- Other common information -->
        <?php if($userRoles->isOwner($user[0]['userid']) || ($userRoles->isAdmin() && !$userRoles->isOwner($user[0]['userid']))) : ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-card-checklist"></i></div>
              <h4 class="title"><a href="">My Stakes</a></h4>
                <?php if(!empty($limitedStakes) && (is_array($limitedStakes))) : ?>
                <div style="overflow-x:auto;">
                <table id="stakes" class="table table-striped" style="width:100%; background-color:white; color:white; font-size:12px;">
                    <thead style="background-color:#ff5821;">
                        <tr style="font-size:12px; font-weight:bold;">
                            <th>Contest ID</th>
                            <th>Possibility</th>
                            <th>Odd</th>
                            <th>Stake</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php foreach($limitedStakes as $limitedStake) : ?> 
                        <?php foreach($limitedStake as $index => $value) : ?>
                    <tr>
                        <td style="color:grey;"><?php echo $value['contestid']; ?></td>
                        <td style="color:grey;"><?php echo $value['possibility']; ?></td>
                        <td style="color:grey;"><?php echo $value['odd']; ?></td>
                        <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['stake'], 2, '.', ','); ?></td>
                        <td style="color:grey;"><?php echo date("F jS, Y", strtotime($value['created_at'])); ?></td>
                    </tr>
                       <?php endforeach; ?>
                  <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php else : ?>
                    <div style="background-color:red;">You don't have any stake available.</div>
                <?php endif; ?>
                <?php if(count($limitedStake) > 0) : ?>
                    <div id="seemore"><a href="mystakes.php?u=<?php echo $user[0]['userid']; ?>">See more...</a></div>
                <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="zmdi zmdi-star-circle" style="font-size:32px;"></i></div>
              <h4 class="title"><a href="">My Wins</a></h4>
              <?php if(!empty($wins) && (is_array($wins))) : ?>
                <div style="overflow-x:auto;">
                <table id="stakes" class="table table-striped" style="width:100%; background-color:white; color:white; font-size:12px;">
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
                        <td style="color:grey;"><?php echo $value['contestid']; ?></td>
                        <td style="color:grey;"><?php echo $value['contester_a']; ?></td>
                        <td style="color:grey;"><?php echo $value['contester_b']; ?></td>
                        <td style="color:grey;"><?php echo $value['contest_result']; ?></td>
                        <td style="color:grey;"><?php echo $value['odd']; ?></td>
                    </tr>
                       <?php endforeach; ?>
                  <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php else : ?>
                    <div style="background-color:red;">You don't have any stake available.</div>
                <?php endif; ?>
                <?php if(count($win) > 0) : ?>
                    <div id="seemore"><a href="mywins.php?u=<?php echo $user[0]['userid']; ?>">See more...</a></div>
                <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="zmdi zmdi-star-circle" style="font-size:32px;"></i></div>
              <h4 class="title"><a href="">My Withdraw Requests</a></h4>
              <?php if(!empty($withrawrequests) && (is_array($withrawrequests))) : ?>
                <div style="overflow-x:auto;">
                <table id="stakes" class="table table-striped" style="width:100%; background-color:white; color:white; font-size:12px;">
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
                        <td style="color:grey;"><?php echo $value['userid']; ?></td>
                        <td style="color:grey;"><?php echo $value['bank_name']; ?></td>
                        <td style="color:grey;"><?php echo $value['bank_account']; ?></td>
                        <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['amount'], 2, '.', ','); ?></td>
                    </tr>
                       <?php endforeach; ?>
                  <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php else : ?>
                    <div style="background-color:red;">You don't have any stake available.</div>
                <?php endif; ?>
                <?php if(count($withrawrequest) > 0) : ?>
                    <div id="seemore"><a href="myrequests.php?u=<?php echo $user[0]['userid']; ?>">See more...</a></div>
                <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="zmdi zmdi-star-circle" style="font-size:32px;"></i></div>
              <h4 class="title"><a href="">My Wallet Transactions</a></h4>
              <?php if(!empty($mywallettrans) && (is_array($mywallettrans))) : ?>
                <div style="overflow-x:auto;">
                <table id="stakes" class="table table-striped" style="width:100%; background-color:white; color:white; font-size:12px;">
                    <thead style="background-color:#ff5821;">
                        <tr style="font-size:12px; font-weight:bold;">
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php foreach($mywallettrans as $mywallettran) : ?> 
                        <?php foreach($mywallettran as $index => $value) : ?>
                        <?php 
                            if($value['amount'] < 0) {
                                $amount = "<span style='color:red;'>&#8358;".number_format((float)$value['amount'], 2, '.', ',')."</span>";
                            } else {
                               $amount = "<span style='color:green;'>&#8358;".number_format((float)$value['amount'], 2, '.', ',')."</span>";
                            }
                        ?>
                    <tr>
                        <td style="color:grey;"><?php echo ucfirst($value['payment_type']); ?></td>
                        <td style="color:grey;"><?php echo $amount; ?></td>
                        <td style="color:grey;"><?php echo date("F jS, Y", strtotime($value['created_at'])); ?></td>
                    </tr>
                       <?php endforeach; ?>
                  <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php else : ?>
                    <div style="background-color:red;">You don't have any wallet balance available.</div>
                <?php endif; ?>
                <?php if(count($mywallettran) > 0) : ?>
                    <div id="seemore"><a href="mywallettrans.php">See more...</a></div>
                <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="zmdi zmdi-star-circle" style="font-size:32px;"></i></div>
              <h4 class="title"><a href="">My Ticket Purchases</a></h4>
              <?php if(!empty($myticketpurchases) && (is_array($myticketpurchases))) : ?>
                <div style="overflow-x:auto;">
                <table id="stakes" class="table table-striped" style="width:100%; background-color:white; color:white; font-size:12px;">
                    <thead style="background-color:#ff5821;">
                        <tr style="font-size:12px; font-weight:bold;">
                            <th>Ticket Type</th>
                            <th>Amount</th>
                            <th>Fight Name</th>
                            <th>Promo Code</th>
                            <th>Pass Code</th>
                        </tr>
                    </thead>
                    <tbody>
                  <?php foreach($myticketpurchases as $myticketpurchase) : ?> 
                        <?php foreach($myticketpurchase as $index => $value) : ?>
                    <tr>
                        <td style="color:grey;"><?php echo strtoupper($value['ticket_type']); ?></td>
                        <td style="color:grey;"><?php echo '&#8358;'.number_format((float)$value['price'], 2, '.', ','); ?></td>
                        <td style="color:grey;"><?php echo $value['fightname']; ?></td>
                        <td style="color:grey;"><?php echo $value['code']; ?></td>
                        <td style="color:grey;"><?php echo $value['event_code']; ?></td>
                    </tr>
                       <?php endforeach; ?>
                  <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
                <?php else : ?>
                    <div style="background-color:red;">You don't have any available ticket purchase.</div>
                <?php endif; ?>
                <?php if(count($myticketpurchase) > 0) : ?>
                    <div id="seemore"><a href="myticketpurchase.php">See more...</a></div>
                <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>     
        </div>
      </div>
    </section><!-- End Services Section -->
<link href="assets/css/custom.css" rel="stylesheet">

<?php
include 'footer.php'; 
?>