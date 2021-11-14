


<?php


$formerror = array();
  $avatarname  = $_FILES['avatar']['name'];
  $avatarsize  = $_FILES['avatar']['size'];
  $avatartemp  = $_FILES['avatar']['tmp_name'];
  $avatartype  = $_FILES['avatar']['type'];

  $avatarallowedex = array("jpeg","jpg","png","gif");
  $avatarex = explode(".", $avatarname );
  $srt_s = strtolower(end($avatarex));
  

  if($avatarsize > 4194304){
    $formerror[] ='Avatar Cant Be Larger Than 4MB';
    }
    if(!empty($avatarname)&&!in_array($srt_s,$avatarallowedex)){
    $formerror[] ='This Extension Is Not Allowed';
    }
    if(empty($avatarname ) ){
      $formerror[] ='Avatar Is Required';
      }
      if(empty($formerror)){
        $avatar= rand(0, 10000000000) .'_'. $avatarname;
        move_uploaded_file($avatartemp ,"upload\avatar\\". $avatar );

        // Insert User The Database                                                        //Varibal
$stmt =$coon->prepare("INSERT INTO users(username,email,password,fullname,regstatus,date, u_img)
value(:user,:mail,:pass,:name,1,now() , :zimg)");
$stmt->execute(array(
'user'=>  $user, 
'mail'=>  $email , 
'pass'=>  $hashpass , 
'name'=>  $full, 
'zimg'=>  $avatar
));
if($stmt){
  echo  "GOOD IMAGE";
}

// Echo Message
$themsg = "<div class= 'alert alert-success text-center'>"   .$stmt->rowCount() .  'Save Add Member</div>';
redirecthome($themsg , 'back' );
}
//End Function To Check Username In Database

        





?>



<form action="ada.php" method="post" enctype="multipart/form-data">
<input type="file" name="avatar" id=""><br>
<input  type="submit" value="Upload">

</form>