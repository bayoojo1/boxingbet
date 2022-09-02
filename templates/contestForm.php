<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
  <div class="col-xl-9 col-lg-12 mt-4">
<!--    <div class="php-email-form">-->
      <div class="form-group mt-3">
        <?php if(isset($contest[0]['contestid'])) : ?>
        <input type="hidden" name="contestId" id="contestId" value="<?php echo $contest[0]['contestid']; ?>">
        <?php endif; ?>
        <?php if(isset($contest[0]['contester_a']) || isset($contest[0]['contester_a'])) : ?>
        <label for="contester_a">Contester A</label>
        <input type="text" class="form-control" name="contester_a" id="contester_a" value="<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" disabled>
      <div class="form-group mt-3">
        <label for="contester_b">Contester B</label>
        <input type="text" class="form-control" name="contester_b" id="contester_b" value="<?php echo $contest[0]['contester_b']; ?>" disabled>
      </div>
      <hr>
      <?php else : ?>
         <div class="form-group mt-3 text-center">
            <label for="contester_a">Select Contester A</label><br>
            <?php if(!empty($listboxers) && (is_array($listboxers))) : ?>
            <select name="contester_a" id="contester_a">
                <?php foreach($listboxers as $listboxer) : ?>
                    <?php foreach($listboxer as $index => $value) : ?>
                <option value="<?php echo $value['userid']; ?>"><?php echo $value['alias']; ?></option>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>
            <?php endif; ?>
      </div>
      <div class="form-group mt-3 text-center">
        <label for="contester_b">Select Contester B</label><br>
        <?php if(!empty($listboxers) && (is_array($listboxers))) : ?>
            <select name="contester_b" id="contester_b">
                <?php foreach($listboxers as $listboxer) : ?>
                    <?php foreach($listboxer as $index => $value) : ?>
                <option value="<?php echo $value['userid']; ?>"><?php echo $value['alias']; ?></option>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>
            <?php endif; ?>
      </div>
      <hr>
      <?php endif; ?>
      <h2 data-aos="fade-up" class="text-center">Contester A Odds</h2>
      <div class="form-group mt-3">
        <label for="a_wins_odd" style="width:30%;">A wins B</label>
        <input type="text" class="form-control" name="a_wins_odd" id="a_wins_odd" value="<?php if(isset($contest[0]['a_wins_odd'])) echo $contest[0]['a_wins_odd']; ?>" style="width:40%; display:inline;">
          <span style="width:20%">Win: <input type="radio" name="win" value="a_wins_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_wins_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_wins_tko_odd" style="width:30%;">A wins TKO</label>
        <input type="text" class="form-control" name="a_wins_tko_odd" id="a_wins_tko_odd" value="<?php if(isset($contest[0]['a_wins_tko_odd'])) echo $contest[0]['a_wins_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_wins_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_wins_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_wins_split_odd" style="width:30%;">A wins split</label>
        <input type="text" class="form-control" name="a_wins_split_odd" id="a_wins_split_odd" value="<?php if(isset($contest[0]['a_wins_split_odd'])) echo $contest[0]['a_wins_split_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_wins_split_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_wins_split_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_wins_unanimous_odd" style="width:30%;">A wins unanimously</label>
        <input type="text" class="form-control" name="a_wins_unanimous_odd" id="a_wins_unanimous_odd" value="<?php if(isset($contest[0]['a_wins_unanimous_odd'])) echo $contest[0]['a_wins_unanimous_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_wins_unanimous_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_wins_unanimous_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r1_tko_odd" style="width:30%;">A wins round 1 TKO</label>
        <input type="text" class="form-control" name="a_r1_tko_odd" id="a_r1_tko_odd" value="<?php if(isset($contest[0]['a_r1_tko_odd'])) echo $contest[0]['a_r1_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r1_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r1_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r2_tko_odd" style="width:30%;">A wins round 2 TKO</label>
        <input type="text" class="form-control" name="a_r2_tko_odd" id="a_r2_tko_odd" value="<?php if(isset($contest[0]['a_r2_tko_odd'])) echo $contest[0]['a_r2_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r2_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r2_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r3_tko_odd" style="width:30%;">A wins round 3 TKO</label>
        <input type="text" class="form-control" name="a_r3_tko_odd" id="a_r3_tko_odd" value="<?php if(isset($contest[0]['a_r3_tko_odd'])) echo $contest[0]['a_r3_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r3_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r3_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r4_tko_odd" style="width:30%;">A wins round 4 TKO</label>
        <input type="text" class="form-control" name="a_r4_tko_odd" id="a_r4_tko_odd" value="<?php if(isset($contest[0]['a_r4_tko_odd'])) echo $contest[0]['a_r4_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r4_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r4_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r5_tko_odd" style="width:30%;">A wins round 5 TKO</label>
        <input type="text" class="form-control" name="a_r5_tko_odd" id="a_r5_tko_odd" value="<?php if(isset($contest[0]['a_r5_tko_odd'])) echo $contest[0]['a_r5_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r5_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r5_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r6_tko_odd" style="width:30%;">A wins round 6 TKO</label>
        <input type="text" class="form-control" name="a_r6_tko_odd" id="a_r6_tko_odd" value="<?php if(isset($contest[0]['a_r6_tko_odd'])) echo $contest[0]['a_r6_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r6_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r6_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r7_tko_odd" style="width:30%;">A wins round 7 TKO</label>
        <input type="text" class="form-control" name="a_r7_tko_odd" id="a_r7_tko_odd" value="<?php if(isset($contest[0]['a_r7_tko_odd'])) echo $contest[0]['a_r7_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r7_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r7_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r8_tko_odd" style="width:30%;">A wins round 8 TKO</label>
        <input type="text" class="form-control" name="a_r8_tko_odd" id="a_r8_tko_odd" value="<?php if(isset($contest[0]['a_r8_tko_odd'])) echo $contest[0]['a_r8_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r8_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r8_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r9_tko_odd" style="width:30%;">A wins round 9 TKO</label>
        <input type="text" class="form-control" name="a_r9_tko_odd" id="a_r9_tko_odd" value="<?php if(isset($contest[0]['a_r9_tko_odd'])) echo $contest[0]['a_r9_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r9_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r9_tko_odd') echo 'checked'; ?>></span>
      </div>
       <div class="form-group mt-3">
        <label for="a_r10_tko_odd" style="width:30%;">A wins round 10 TKO</label>
        <input type="text" class="form-control" name="a_r10_tko_odd" id="a_r10_tko_odd" value="<?php if(isset($contest[0]['a_r10_tko_odd'])) echo $contest[0]['a_r10_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r10_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r10_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r11_tko_odd" style="width:30%;">A wins round 11 TKO</label>
        <input type="text" class="form-control" name="a_r11_tko_odd" id="a_r11_tko_odd" value="<?php if(isset($contest[0]['a_r11_tko_odd'])) echo $contest[0]['a_r11_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r11_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r11_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="a_r12_tko_odd" style="width:30%;">A wins round 12 TKO</label>
        <input type="text" class="form-control" name="a_r12_tko_odd" id="a_r12_tko_odd" value="<?php if(isset($contest[0]['a_r12_tko_odd'])) echo $contest[0]['a_r12_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="a_r12_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'a_r12_tko_odd') echo 'checked'; ?>></span>
      </div>
      <hr>
      <div class="form-group mt-3">
        <label for="draw_odd" style="width:30%;">Draw</label>
        <input type="text" class="form-control" name="draw_odd" id="draw_odd" value="<?php if(isset($contest[0]['draw_odd'])) echo $contest[0]['draw_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="draw_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'draw_odd') echo 'checked'; ?>></span>
      </div>
      <hr>
      <h2 data-aos="fade-up" class="text-center">Contester B Odds</h2>
      <div class="form-group mt-3">
        <label for="b_wins_odd" style="width:30%;">B wins A</label>
        <input type="text" class="form-control" name="b_wins_odd" id="b_wins_odd" value="<?php if(isset($contest[0]['b_wins_odd'])) echo $contest[0]['b_wins_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_wins_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_wins_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_wins_tko_odd" style="width:30%;">B wins TKO</label>
        <input type="text" class="form-control" name="b_wins_tko_odd" id="b_wins_tko_odd" value="<?php if(isset($contest[0]['b_wins_tko_odd'])) echo $contest[0]['b_wins_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_wins_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_wins_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_wins_split_odd" style="width:30%;">B wins split</label>
        <input type="text" class="form-control" name="b_wins_split_odd" id="b_wins_split_odd" value="<?php if(isset($contest[0]['b_wins_split_odd'])) echo $contest[0]['b_wins_split_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_wins_split_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_wins_split_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_wins_unanimous_odd" style="width:30%;">B wins unanimously</label>
        <input type="text" class="form-control" name="b_wins_unanimous_odd" id="b_wins_unanimous_odd" value="<?php if(isset($contest[0]['b_wins_unanimous_odd'])) echo $contest[0]['b_wins_unanimous_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_wins_unanimous_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_wins_unanimous_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r1_tko_odd" style="width:30%;">B wins round 1 TKO</label>
        <input type="text" class="form-control" name="b_r1_tko_odd" id="b_r1_tko_odd" value="<?php if(isset($contest[0]['b_r1_tko_odd'])) echo $contest[0]['b_r1_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r1_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r1_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r2_tko_odd" style="width:30%;">B wins round 2 TKO</label>
        <input type="text" class="form-control" name="b_r2_tko_odd" id="b_r2_tko_odd" value="<?php if(isset($contest[0]['b_r2_tko_odd'])) echo $contest[0]['b_r2_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r2_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r2_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r3_tko_odd" style="width:30%;">B wins round 3 TKO</label>
        <input type="text" class="form-control" name="b_r3_tko_odd" id="b_r3_tko_odd" value="<?php if(isset($contest[0]['b_r3_tko_odd'])) echo $contest[0]['b_r3_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r3_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r3_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r4_tko_odd" style="width:30%;">B wins round 4 TKO</label>
        <input type="text" class="form-control" name="b_r4_tko_odd" id="b_r4_tko_odd" value="<?php if(isset($contest[0]['b_r4_tko_odd'])) echo $contest[0]['b_r4_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r4_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r4_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r5_tko_odd" style="width:30%;">B wins round 5 TKO</label>
        <input type="text" class="form-control" name="b_r5_tko_odd" id="b_r5_tko_odd" value="<?php if(isset($contest[0]['b_r5_tko_odd'])) echo $contest[0]['b_r5_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r5_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r5_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r6_tko_odd" style="width:30%;">B wins round 6 TKO</label>
        <input type="text" class="form-control" name="b_r6_tko_odd" id="b_r6_tko_odd" value="<?php if(isset($contest[0]['b_r6_tko_odd'])) echo $contest[0]['b_r6_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r6_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r6_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r7_tko_odd" style="width:30%;">B wins round 7 TKO</label>
        <input type="text" class="form-control" name="b_r7_tko_odd" id="b_r7_tko_odd" value="<?php if(isset($contest[0]['b_r7_tko_odd'])) echo $contest[0]['b_r7_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r7_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r7_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r8_tko_odd" style="width:30%;">B wins round 8 TKO</label>
        <input type="text" class="form-control" name="b_r8_tko_odd" id="b_r8_tko_odd" value="<?php if(isset($contest[0]['b_r8_tko_odd'])) echo $contest[0]['b_r8_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r8_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r8_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r9_tko_odd" style="width:30%;">B wins round 9 TKO</label>
        <input type="text" class="form-control" name="b_r9_tko_odd" id="b_r9_tko_odd" value="<?php if(isset($contest[0]['b_r9_tko_odd'])) echo $contest[0]['b_r9_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r9_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r9_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r10_tko_odd" style="width:30%;">B wins round 10 TKO</label>
        <input type="text" class="form-control" name="b_r10_tko_odd" id="b_r10_tko_odd" value="<?php if(isset($contest[0]['b_r10_tko_odd'])) echo $contest[0]['b_r10_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r10_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r10_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r11_tko_odd" style="width:30%;">B wins round 11 TKO</label>
        <input type="text" class="form-control" name="b_r11_tko_odd" id="b_r11_tko_odd" value="<?php if(isset($contest[0]['b_r11_tko_odd'])) echo $contest[0]['b_r11_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r11_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r11_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="b_r12_tko_odd" style="width:30%;">B wins round 12 TKO</label>
        <input type="text" class="form-control" name="b_r12_tko_odd" id="b_r12_tko_odd" value="<?php if(isset($contest[0]['b_r12_tko_odd'])) echo $contest[0]['b_r12_tko_odd']; ?>" style="width:40%; display:inline;">
        <span style="width:20%">Win: <input type="radio" name="win" value="b_r12_tko_odd-<?php echo isset($contest[0]['contestid']) ? $contest[0]['contestid'] : ""; ?>" <?php if(isset($showWin[0]['contest_result']) && $showWin[0]['contest_result'] == 'b_r12_tko_odd') echo 'checked'; ?>></span>
      </div>
      <div class="form-group mt-3">
        <label for="event_date">Event Date</label>
        <input type="datetime-local" class="form-control" name="event_date" id="event_date" value="<?php if(isset($contest[0]['event_date'])) echo $contest[0]['event_date']; ?>">
      </div>
      <div class="form-group mt-3">
        <label for="event_location">Event Location</label>
        <input type="text" class="form-control" name="event_location" id="event_location" value="<?php if(isset($contest[0]['event_location'])) echo $contest[0]['event_location']; ?>">
      </div>
      <br>
      <br />
      <div class="text-center"><input type="submit" id="updateContest" value="<?php if (isset($buttonText)) echo $buttonText; else echo "Create Contest"; ?>" style="background-color:#ff5821; color:white;"></div>
    </div>
<!--  </div>-->
</div>
</div>