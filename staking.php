<?php
/** This script is no more in use. Left for reference purpose **/
/** This script is no more in use. Left for reference purpose **/
/** This script is no more in use. Left for reference purpose **/
/** This script is no more in use. Left for reference purpose **/

require_once __DIR__ .'/inc/bootstrap.php';
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/templates/nav.php';

//$isAuth = new UserAuth();
//$isAuth->requireAuth();
$userId = $session->get('auth_user_id');

if(!isset($userId) && empty($userId)) {
    redirect('login.php');
    exit;
}

if(isset($_POST['submit'])) {
    $contestId = filter_input(INPUT_POST, 'cid', FILTER_SANITIZE_STRING);

    $contests = new Contest();
    $contest = $contests->getAllContest($contestId);
    $contest = json_decode($contest, true);
    
    $odds = $contests->getOdds();
    $odds = json_decode($odds, true);
    
    $contesters = $contests->getAllContest($contestId);
    $contesters = json_decode($contesters, true);

    $users = new User();
}
?>
<section class="staking">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
      <div class="col-xl-6 col-lg-12 mt-4">
    <!--    <div class="php-email-form">-->
         <form method="post" action="procedures/payment.php">   
          <div class="form-group mt-3">
          <h2 data-aos="fade-up" class="text-center" style="color:white;">Stakes</h2>
          <br><br><br>
         <div class="fight" style="text-align:center; color:white;"> 
            <div class="fighter">
                <?php 
                    $contesterA = $users->findUserById($contesters[0]['contester_a']); 
                    $contesterA = json_decode($contesterA, true);
                ?>
                    <h4>Contester A</h4>
                    <img src="<?php echo isset($contesterA[0]['img_url'])? $contesterA[0]['img_url'] : "https://via.placeholder.com/600/09f/fff.png"; ?>" style="width:200px;" class="testimonial-img t-img" alt="">
                    <h3><?php echo $contesterA[0]['alias']; ?></h3>
                    <h4><?php echo $contesterA[0]['fname']. ' '.$contesterA[0]['lname']; ?></h4>
                    <p>Weight: <?php echo $contesterA[0]['weight']; ?></p>
                    <p>Height: <?php echo $contesterA[0]['height']; ?></p>
                    <p>Stance: <?php echo $contesterA[0]['stance']; ?></p>
                    <p>Sex: <?php echo $contesterA[0]['sex']; ?></p>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      <?php echo $contesterA[0]['aboutme']; ?>
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
                  <div class="fighter">
                    <?php 
                      $contesterB = $users->findUserById($contesters[0]['contester_b']); 
                      $contesterB = json_decode($contesterB, true);
                    ?>
                    <h4>Contester B</h4>
                    <img src="<?php echo isset($contesterB[0]['img_url'])? $contesterB[0]['img_url'] : "https://via.placeholder.com/600/09f/fff.png"; ?>" style="width:200px;" class="testimonial-img t-img" alt="">
                    <h3><?php echo $contesterB[0]['alias']; ?></h3>
                    <h4><?php echo $contesterB[0]['fname']. ' '.$contesterB[0]['lname']; ?></h4>
                    <p>Weight: <?php echo $contesterB[0]['weight']; ?></p>
                    <p>Height: <?php echo $contesterB[0]['height']; ?></p>
                    <p>Stance: <?php echo $contesterB[0]['stance']; ?></p>
                    <p>Sex: <?php echo $contesterB[0]['sex']; ?></p>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      <?php echo $contesterB[0]['aboutme']; ?>
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
              </div>
          <div class="form-group mt-3" style="width:100%; overflow-x:auto;">
              <table id="stakes" class="table table-striped" style="width:100%; background-color:#adb5bd; color:white; font-size:16px;">
                <thead style="background-color:#ff5821;">
                    <tr style="font-size:12px; font-weight:bold;">
                        <th style="width:25%; text-align:center;">Result</th>
                        <th style="width:25%; text-align:center;">Odd</th>
                        <th style="width:25%; text-align:center;">Stake</th>
                        <th style="width:25%; text-align:center;">Win</th>
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center;">
                        <?php if(!empty($odds) && (is_array($odds))) : ?>
                        <select name="mystake" id="mystake">
                            <?php foreach($odds as $odd) : ?>
                                <?php foreach($odd as $index => $value) : ?>
                                    <option value="<?php echo $value['odd'].'-'.$contestId; ?>"><?php echo $value['value']; ?></option>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                        <?php endif; ?>
                        </td>
                        <td style="text-align:center;" id="showOdd" name="showOdd"></td>
                        <td style="text-align:center;"><input type="text" name="amountStaked" id="amountStaked" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');"></td>
                        <td style="text-align:center;" id="win"></td>
                    </tr>
                </tbody>
              </table>
          </div>
          <br>
          <input type="hidden" name="thisOdd" id="thisOdd">
          <input type="hidden" name="contestId" id="contestId" value="<?php echo isset($contest[0]['contestid'])? $contest[0]['contestid'] : ""; ?>">
          <div class="text-center"><input type="submit" value="Submit" style="background-color:#ff5821; color:white;"></div>
        </div>
        </form>
    <!--  </div>-->
    </div>
    </div>
</section>
<br>
<br />
<link href="assets/css/custom.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="vendor/sweetalert/sweetalert.min.js"></script>
<script src="js/stakebet.js"></script>

<?php
include __DIR__ .'/templates/footer.php'; 
?>

