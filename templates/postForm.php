<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
      <div class="col-xl-9 col-lg-12 mt-4">
        <div class="php-email-form">
          <div class="form-group mt-3">
            <?php if(isset($user[0]['email'])) : ?>
                <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or mobile" value="<?php echo $user[0]['email']; ?>" disabled>
            <?php elseif (isset($user[0]['mobile'])) : ?>
                <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or mobile" value="<?php echo $user[0]['mobile']; ?>" disabled>
            <?php else : ?>
                <input type="text" class="form-control" name="identity" id="identity" placeholder="Email or mobile" oninput="this.value = this.value.replace(/[^-@.0-9a-z]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
            <?php endif; ?>
          </div>
          <div class="form-group mt-3">
            <?php if(isset($user[0]['password'])) : ?>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $user[0]['password']; ?>" disabled>
            <?php else : ?>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <?php endif; ?>
          </div>
          <div class="form-group mt-3">
            <?php if(!isset($user[0]['password'])) : ?>
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
            <?php endif; ?>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php if(isset($user[0]['fname'])) echo $user[0]['fname']; ?>" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php if(isset($user[0]['lname'])) echo $user[0]['lname']; ?>" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="alias" id="alias" placeholder="Alias" value="<?php if(isset($user[0]['alias'])) echo $user[0]['alias']; ?>" required>
          </div>
          <div class="form-group mt-3">
            <textarea type="text" class="form-control" name="aboutme" id="aboutme" placeholder="About Me"><?php if(isset($user[0]['aboutme'])) echo $user[0]['aboutme']; ?></textarea>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight" value="<?php if(isset($user[0]['weight'])) echo $user[0]['weight']; ?>" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="height" id="height" placeholder="Height" value="<?php if(isset($user[0]['height'])) echo $user[0]['height']; ?>" required>
          </div>
          <div class="form-group mt-3" style="border: 1px solid #ced4da; padding: 10px; color: grey;">
            <p>Please select your stance</p>
              <input type="radio" id="orthodox" name="stance" value="Orthodox" <?php if(isset($user[0]['stance']) && $user[0]['stance'] == 'Orthodox') : ?>
             checked="checked"
             <?php endif; ?>
             required>
              <label for="orthodox">Orthodox</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" id="southpaw" name="stance" value="Southpaw" <?php if(isset($user[0]['stance']) && $user[0]['stance'] == 'Southpaw') : ?>
             checked="checked"
             <?php endif; ?>>
              <label for="southpaw">Southpaw</label>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="clubname" id="clubname" placeholder="Club Name" value="<?php if(isset($user[0]['club_name'])) echo $user[0]['club_name']; ?>" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="coach" id="coach" placeholder="Coach" value="<?php if(isset($user[0]['coach'])) echo $user[0]['coach']; ?>" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="state" id="state" placeholder="State" value="<?php if(isset($user[0]['state'])) echo $user[0]['state']; ?>" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality" value="<?php if(isset($user[0]['nationality'])) echo $user[0]['nationality']; ?>" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php if(isset($user[0]['age'])) echo $user[0]['age']; ?>" required>
          </div>
          <div class="form-group mt-3" style="border: 1px solid #ced4da; padding: 10px; color: grey;">
            <p>Please select your sex</p>
              <input type="radio" id="male" name="sex" value="Male" <?php if(isset($user[0]['sex']) && $user[0]['sex'] == 'Male') : ?>
             checked="checked"
             <?php endif; ?>
             required>
              <label for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" id="female" name="sex" value="Female" <?php if(isset($user[0]['sex']) && $user[0]['sex'] == 'Female') : ?>
             checked="checked"
             <?php endif; ?>>
              <label for="female">Female</label>
          </div>
          
          <?php if(isset($ownerId)) : ?>
            <div class="form-group mt-3 text-center">
                    <label for="chooseFile">
                    <img src="./images/upload2.png" class="upload_img" title="Upload picture" style="width:80px; height:60px; cursor:pointer;">
                    </label><input type="file" class="custom-file-input" name="photo" id="chooseFile" style="position: absolute; left: -99999rem;">
            </div>
            <?php endif; ?>
            
          <div class="form-group mt-3 text-center">
            <a class="terms" style="color:#ff5821; display:inline;" href="terms.php">Terms and Conditions:</a> 
            <input type="checkbox" style="display:inline; vertical-align:-2px;" name="terms" id="terms" required>
          </div>
          <br>
          <br />
          <div class="text-center"><input type="submit" id="btnRegisterBoxer" value="<?php if (isset($buttonText)) echo $buttonText; else echo "Register"; ?>" style="background-color:#ff5821; color:white;"></div>
        </div>
      </div>

    </div>