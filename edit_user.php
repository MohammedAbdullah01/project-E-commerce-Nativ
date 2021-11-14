<?php
session_start();
$pagetitle= 'Edite Profile';
include 'init.php';
if(isset($_SESSION['user'])){

$stmt=$coon->prepare("SELECT * FROM users WHERE userid = ? ");
$stmt->execute(array($_SESSION['uid']));
$get_data =$stmt->fetch();
$count = $stmt->rowCount();
if(isset($_GET['EditProfile']) && ! empty($_GET['EditProfile'])){
  $home = $_GET['EditProfile'];


if($home == "Edit"){
?>
<div class="container">
<h2 class="text-center">Edit Information</h2><hr>
<div class="text-center">
<?php
if(!empty($get_data['u_img'])){
?>
<img class="rounded" src="admin/upload/avatar/<?php echo $get_data['u_img']?>" alt="">
<?php
}else{?>
<img class="rounded" src="admin/upload/avatar/Defualte.jpg" alt="">
<?php
}
?>
</div>
<div class="row">
<div class=" col-md-6 edit-user ">
<form  action="?EditProfile=Update" method="post" enctype="multipart/form-data">
<div class="input-group mb-3">
<span class="input-group-text text-center">  
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera-fill text-start " viewBox="0 0 16 16">
  <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
</svg>user Photo</span>
<input type="file" class="form-control" name="avataru">
</div>
<div class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera-fill text-start " viewBox="0 0 16 16">
  <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
</svg> Cover Photo</span>
<input type="file" class="form-control" name="avatarp">
</div>


<!-- Start Name -->
<div class="input-group mb-3">
<input type="hidden" class="form-control " name="user" value="<?php echo $get_data['username']?>" placeholder="Please write the login name">
</div>
<!-- End Name -->

<!-- Start Full Name -->
<div class="input-group mb-3">
<span class="input-group-text">Full Name</span>
<input type="text" class="form-control" name="full"  value="<?php echo $get_data['fullname']?>"  placeholder="Please Write Your Full Name" >
</div>
<!-- End Full Name -->

<!-- Start Old-Password -->
<div class="input-group mb-3">

<input type="hidden" class="form-control " name="old-pass" value="<?php echo $get_data['password']?>">
</div>
<!-- End Old-Password -->

<!-- Start New-Password -->
<div class="input-group mb-3">
<span class="input-group-text">Change-Password</span>
<input type="password" class="form-control " name=" new-pass" placeholder="Please write a strong password"  >
</div>
<!-- End New-Password -->

<!-- Start E-mail -->
<div class="input-group mb-3">
<span class="input-group-text">E-mail</span>
<input type="email" class="form-control" name="Email"  value="<?php echo $get_data['email']?>" placeholder="Please Write Your Email Valid" >
</div>
<!-- End E-mail -->


<!-- Start Mobile Number -->
<div class="input-group mb-3">
<span class="input-group-text">Mobile Number</span>
<input type="text" class="form-control" name="mopile_n" value="<?php echo $get_data['mopile_number']?> " >
</div>
<!-- End Mobile Number -->

<!-- Start Gender -->
<div class="input-group mb-3">
<span class="input-group-text">Gender</span>
<select class="form-select" type="text" class="form-control" name="gender" placeholder="Country Of The Item" >
<option selected value="0">Choose...</option>
<option <?php if($get_data['gander']== 1){ echo "selected";}?>  value="1">Male</option>
<option <?php if($get_data['gander']== 2){ echo "selected";}?>  value="2">Female</option>
</select>
</div>
<!-- End Gender -->

<!--Start Button Save Informition-->
<input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Save Informition">
<!--Start Button Save Informition-->

</form>
</div>
</div>
</div>


<?php
}elseif($home == "Update"){?>
<div class = 'container text-center'>
<h2 class = 'text-center'>Update Member</h2>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
     // Upload Variables Img-User
$avatarname  = $_FILES['avataru']['name'];
$avatarsize  = $_FILES['avataru']['size'];
$avatartemp  = $_FILES['avataru']['tmp_name'];
$avatartype  = $_FILES['avataru']['type'];

// Upload Variables Img-Profile
$avatarnamep  = $_FILES['avatarp']['name'];
$avatarsizep  = $_FILES['avatarp']['size'];
$avatartempp  = $_FILES['avatarp']['tmp_name'];
$avatartypep  = $_FILES['avatarp']['type'];

// List Of Allowed File Typed To Upload
$avatarallowedex = array("jpeg","jpg","png","gif");
$avataruser      = explode(".", $avatarname );
$srt_u           = strtolower(end($avataruser));
$avatarprofi     = explode(".", $avatarnamep );
$srt_p           = strtolower(end($avatarprofi));
$username        = filter_var( $_POST['user']    ,FILTER_SANITIZE_STRING);
// Track Password
$pass = '';
if(empty($_POST['new-pass'])){
$pass =  $_POST['old-pass'];
}
else{
$pass   = sha1($_POST['new-pass']);
}
$Email  = filter_var( $_POST['Email']   ,FILTER_SANITIZE_EMAIL);
$full   = filter_var( $_POST['full']    ,FILTER_SANITIZE_STRING);
$mopile = filter_var( $_POST['mopile_n'],FILTER_SANITIZE_NUMBER_INT);
$gender = filter_var( $_POST['gender']  ,FILTER_SANITIZE_NUMBER_INT);

// Start FORM_ERROR
$formerror =array();
if(strlen( $username ) < 4){
$formerror[] ='Username Cant Be Less The 4 Characters ';
}
if(empty( $username )){
$formerror[] ='Username Cant Be Empty ';
}
if(empty($Email )){
$formerror[] ='Email Cant Be Empty ';
}
if(empty($full )){
$formerror[] ='FullName Cant Be Empty ' ;
}
if(empty($mopile )){
$formerror[] ='Mopile Number Cant Be Empty ' ;
}
if(empty($gender )){
$formerror[] ='Gander Cant Be Empty ' ;
}


if($avatarsize > 4194304){
  $formerror[] ='Avatar Cant Be Larger Than 4MB';
  }
  // Search In Array ON Type Img_User
  if(!empty($avatarname)&&!in_array($srt_u,$avatarallowedex)){
  $formerror[] ='This Extension Personal Picture Is Not Allowed';
  }
// Search In Array ON Type Img_Profile
  if(!empty($avatarname)&&!in_array($srt_p,$avatarallowedex)){
  $formerror[] ='This Extension Cover Photo Is Not Allowed';
  }
  if(empty($avatarname ) ){
    $formerror[] ='Personal Picture Is Required';
    }
  if(empty($avatarnamep ) ){
    $formerror[] ='Cover Photo Is Required';
    }
// LOOP INTO Array
foreach($formerror as $erro){
echo  "<div class= 'alert alert-danger'>" .$erro .'</div>' ; 

}
if(empty($formerror)){
  // Upload image_User to the server
  $avatar= rand(0, 10000000000) .'_'. $avatarname;
  move_uploaded_file($avatartemp ,"admin\upload\avatar\\". $avatar);
// Upload image_Profile to the server
  $avatarp= rand(0, 10000000000) .'_'. $avatarnamep;
  move_uploaded_file($avatartempp ,"admin\upload\avatar_p\\". $avatarp);

  $stmt2= $coon->prepare("SELECT * From users WHERE username = ? ");
  $stmt2->execute(array($username));
  $countt= $stmt2->rowCount();
  if($countt > 0){
 echo "<div class = 'alert alert-danger' >Sorry This name is used</div>";
    
  }else{

  $stmtu=$coon->prepare("UPDATE users SET username = ? ,password=? , email= ?  , fullname = ?  , mopile_number = ?  , gander = ?, u_img= ? , p_img = ? WHERE userid = ?");
    $stmtu->execute(array($username ,$pass ,$Email ,$full ,$mopile   ,$gender  , $avatar , $avatarp , $_SESSION['uid'] ));
   echo "<div class= 'alert alert-success'>" . $stmtu->rowCount() .  'Saved successfully</div>';
   ?>
   <script>
   window.location.href="profile.php";
 </script>
 <?php  
  }
  }
}
?>
</div>
<?php
// Start Delete Items On My Profile

}elseif($home == "Delete"){
  echo "<h2 class = 'text-center'>Delete Member</h2>";
echo "<div class = 'container text-center'>";

$itemid = (isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']): 0);

$checkd =checkusername('item_id', 'items',$itemid);
if(isset($checkd) > 0){

$stmtd=$coon->prepare("DELETE FROM items WHERE item_id = ?");
$stmtd->execute(array($itemid));
$count= $stmtd->rowCount();
?>
<script>
window.location.href="profile.php";
</script>
<?php


}else{
echo  "<div class = 'alert alert-danger>This Item Does Not Exist</div>";

}
}
}else{?>
  <script>
  window.location.href="index.php";
</script>
<?php
}
}else{
header('Location:index.php');
exit();
}
include $tmp  ."footer.php";


?>