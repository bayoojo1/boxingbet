<?php
  $user_uploadDir = '/wamp64/www/boxingbet/awardPhoto/'; 
  $user_fileName = $_FILES["photo"]["name"];
  $user_fileTmpLoc = $_FILES["photo"]["tmp_name"];
  $user_fileType = $_FILES["photo"]["type"];
  $user_fileSize = $_FILES["photo"]["size"];
  $user_fileErrorMsg = $_FILES["photo"]["error"];
  $user_fileExt = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
  $sourceProperties = getimagesize($user_fileTmpLoc);
  if($sourceProperties[0] < 150 || $sourceProperties[1] < 80){
        redirect('../message.php?msg=below');
        exit;
  }
  $imageType = $sourceProperties[2];

  $random = rand(100000000000,999999999999);

  $user_fileNewname = 'award';
  $user_db_file_name = $user_uploadDir.$user_fileNewname.'.'.$user_fileExt;
  $user_img_realName = 'award'.$random.'.'.$user_fileExt;

  if(!$user_fileTmpLoc) {
        redirect('../message.php?msg=uploadpix');
        exit;
  } else if ($user_fileSize > 1048576) {
        redirect('../message.php?msg=toolarge');
        exit;
  } else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $user_fileName) ) {
        redirect('../message.php?msg=filetype');
  } else if ($user_fileErrorMsg == 1) {
        redirect('../message.php?msg=unknown');
        exit;
  }

  switch ($imageType) {

      case IMAGETYPE_PNG:
          $imageResourceId = imagecreatefrompng($user_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagepng($targetLayer,$user_uploadDir . $user_img_realName);
          break;

      case IMAGETYPE_GIF:
          $imageResourceId = imagecreatefromgif($user_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagegif($targetLayer,$user_uploadDir . $user_img_realName);
          break;

      case IMAGETYPE_JPEG:
          $imageResourceId = imagecreatefromjpeg($user_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagejpeg($targetLayer,$user_uploadDir . $user_img_realName,100);
          break;

      default:
            redirect('../message.php?msg=invalid');
            break;
  }

// Move uploaded file to the final directories
$moveResult = move_uploaded_file($user_fileTmpLoc, $user_db_file_name);
if ($moveResult != true) {
    unlink($user_fileTmpLoc);
    redirect('../message.php?msg=failed');
    exit;
  }
// Set the filepath to be sent to the db
$db_file_url = 'awardPhoto/'.$userFolder.'/'.$user_img_realName;
// Delete the original image file
$picurl = $user_db_file_name;
unlink($picurl);

// Update user table with image url and echo userid to ajax
$awards = new Awards();

if($identity === 'nominee') {
   if($awards->updateNomineeImageUrl($nomineeMobile, $db_file_url)) {
    redirect('../allnominees.php');
   } 
} else if($identity === 'sponsor') {
    if($awards->updateSponsorImageUrl($sponsorMobile, $db_file_url)) {
    redirect('../allsponsors.php');
   } 
}



function imageResize($imageResourceId,$width,$height) {

    $targetWidth = 600;
    $targetHeight = 600;

    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    imageconvolution($imageResourceId,array(array(-1,-1,-1),array(-1,16,-1),array(-1,-1,-1)),8,0);


    return $targetLayer;
}
?>