<?php
session_start();
$pagetitle = 'Members'; //Titel Name Page
if(isset($_SESSION['username'])){

  include 'init.php';
$home = isset($_GET['home']) ? $_GET['home'] :'Manage';

  // ========================// 
 // Start Manage Member Page//
// ========================//
if($home == 'Manage'){

$getall= getallfrom("*","users","where groupid != 1","","userid","ASC");

?>
<h2 class="text-center">Manage Member</h2>
<?php
if(! empty($getall)){
?>
<div class="container">
<table class="table data_table table-dark table-hover">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Avatar</th>
<th scope="col">UserName</th>
<th scope="col">Email</th>
<th scope="col">FullName</th>
<th scope="col">Registerd Date</th>
<th scope="col">Control</th>
</tr>
</thead>
<?php
foreach($getall as $row){?>
<tr>
<th><?php echo $row['userid']  ?></th>
<th>
<?php
if(! empty($row['u_img'])){
?>
<img src="upload/avatar/<?php echo $row['u_img']  ?> "alt="">
<?php
}else{?>
<img src="upload/avatar/Defualte.jpg" alt="">
<?php
}
?>
</th>
<th><?php echo $row['username']?></th>
<th><?php echo $row['email']   ?></th>
<th><?php echo $row['fullname']?></th>
<th><?php echo $row['date']    ?></th>

<th>
<a  href='members.php?home=Edit&userid=<?php echo $row['userid']?>' class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
</svg>Edit</a>
<a  href='members.php?home=Delete&userid=<?php echo $row['userid'] ?>'class='btn btn-danger confirm'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
Delete</a>
<?php
if($row['regstatus']== 0){?>
<a  href='members.php?home=Activate&userid=<?php echo $row['userid']?> 'class='btn btn-secondary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2-circle' viewBox='0 0 16 16'>
<path d='M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z'/>
<path d='M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z'/>
</svg>
Activate</a>
<?php
}
?>
</th>
</tr>
<?php
}

?>    
<tr>

</table>

<a href="members.php?home=Add" class="btn btn-primary">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg> New Member</a>
</div>
<?php
}else{
echo "<div class = 'container text-center' >";
echo "<div class= 'alert alert-success'>There Are No Users</div>";?>
<a href="members.php?home=Add" class="btn btn-primary">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg> New Member</a>
<?php echo "</div>";
}
  // ======================// 
 // End Manage Member Page//
// ======================//


  // =====================// 
 // Start ADD Member Page//
// =====================//
}elseif($home == 'Add'){?>
<h2   class = "text-center">Add New Member</h2>
<div  class="container">
<form class="Add-cat" action="?home=Insert" method="post" enctype="multipart/form-data">
<div  class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
<span >UserName</span>
</span>
<input type="text" class="form-control" name="username"  required="required" autocomplete="off" placeholder="UserName To Login"  >
</div>


<div  class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
<span> E_email</span>
</span>
<input type="email" class="form-control" name="email"  required="required" autocomplete="off" placeholder="Email Mest Be Valid"   />
</div>

<div class="input-group mb-3">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg> 
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>
<span>Password</span>
</span>
<input type="password" class="password form-control" name="password"  required="required" autocomplete="new-password" placeholder="Password Must Be Hard" >

</div><div class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg>
<span>FullName</span>
</span>
<input type="text" class="form-control" name="fullname"  required="required" autocomplete="off" placeholder="Full Name Profile Page" >
</div>

<div class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
  <path d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
</svg>
<span >Image</span>
</span>
<input type="file" class="form-control" name="avatar" required >
</div>
<input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Add Member" >
</form>
</div>
<?php 

  // ===================// 
 // End ADD Member Page//
// ===================//


  // ====================// 
 // Insert Member Page  //
// ====================//
}elseif($home == "Insert"){

if($_SERVER['REQUEST_METHOD'] == 'POST'){

echo "<h2 class = 'text-center'>Add Member</h2>";
echo "<div class = 'container text-center'>";
// Upload Variables
$avatarname  = $_FILES['avatar']['name'];
$avatarsize  = $_FILES['avatar']['size'];
$avatartemp  = $_FILES['avatar']['tmp_name'];
$avatartype  = $_FILES['avatar']['type'];
// List Of Allowed File Typed To Upload
$avatarallowedex = array("jpeg","jpg","png","gif");
$avatarex = explode(".", $avatarname );
$srt_s = strtolower(end($avatarex));

$user        = $_POST['username'];
$email       = $_POST['email'];
$pass        = $_POST['password'];
$full        = $_POST['fullname'];
$hashpass    =sha1($_POST['password']);


$formerror =array();
if(strlen($user) < 4){
$formerror[] ='Username Cannot Be Less The 4 Characters ';
}
if(empty($user)){
$formerror[] ='Username Cannot Be Empty';
}
if(empty($email)){
$formerror[] ='Email Cannot Be Empty';
}
if(empty($pass)){
$formerror[] ='Password Cannot Be Empty';
}
if(empty($full)){
$formerror[] ='FullName Cannot Be Empty' ;
}

if($avatarsize > 4194304){
$formerror[] ='Avatar Cant Be Larger Than 4MB';
}
if(!empty($avatarname)&&!in_array($srt_s,$avatarallowedex)){
$formerror[] ='This Extension Is Not Allowed';
}
if(empty($avatarname ) ){
  $formerror[] ='Avatar Is Required';
  }

// LOOP INTO Array
foreach($formerror as $erro){
echo  "<div class= 'alert alert-danger'>" .$erro .'</div>' ; 
}
if(empty($formerror)){
$avatar= rand(0, 10000000000) .'_'. $avatarname;
move_uploaded_file($avatartemp ,"upload\avatar\\". $avatar );

// Start function Check To Username In The Database
$check=checkusername('username','users',$user);

if($check > 0){
$themsg = "<div class = 'alert alert-danger' >Sorry This name is used</div>";
redirecthome($themsg,'back');
}else{
// 
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

// Echo Message
$themsg = "<div class= 'alert alert-success text-center'>"   .$stmt->rowCount() .  'Save Add Member</div>';
 redirecthome($themsg , 'back' );
}
//End Function To Check Username In Database
}

}else{
echo "<div class ='container'>";
$themsg ="<div class = 'alert alert-danger text-center'>Sorry You Cant Browse The Page Directly</div>";
redirecthome($themsg , 'back');     
echo "</div>";
}
echo "</div>";
  // ======================// 
 // End Insert Member Page//
// ======================//

  // ======================// 
 // Start Edit Member Page//
// ======================//

}elseif($home == 'Edit'){
// Check If Request User Id is IT Numeric
$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']): 0;
echo  "<div  class='container text-center'>";
echo  "<h2   class = 'text-center'>Edit Member</h2>";
// Select All Data Is Userid 
$stmt  =$coon->prepare("SELECT * FROM users WHERE userid = ?");
$stmt ->execute(array($userid));
$row   = $stmt->fetch();
$count = $stmt->rowCount();

if($count > 0){?>



<form class="Add-cat" action="?home=Update" method="post" enctype="multipart/form-data">
<input type="hidden" name="userid" value="<?php echo $userid ?>" >
<div  class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
<span >UserName</span>
</span>
<input type="text" class="form-control" name="username" value="<?php echo $row['username'] ?>" required="required" autocomplete="off" aria-label="Dollar amount (with dot and two decimal places)">
</div>

<div  class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
<span> E_email</span>
</span>
<input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required="required"  aria-label="Dollar amount (with dot and two decimal places)"/>
</div>

<div class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>
<span>Password</span>
</span>
<input type="hidden" class="form-control" name="old-password" value="<?php echo $row['password'] ?>"  >
<input type="password" class="form-control" name="new-password" autocomplete="new-password" placeholder="Leave the field blank if you haven't changed it" aria-label="Dollar amount (with dot and two decimal places)">
</div>  

<div class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg>
<span >FullName</span>
</span>
<input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname'] ?>" required="required" autocomplete="off" aria-label="Dollar amount (with dot and two decimal places)">
</div>

<div class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
</svg>
<span >Image</span>
</span>
<input type="file" class="form-control" name="up_img" value="<?php echo $row['u_img']?>"  required="required">
</div>
<input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Save" >
</form>
</div>
<?php
}else{
echo "<div class = 'container'>" ;
$themsg = "<div class = 'alert alert-danger'>Thres No Such ID</div>";
redirecthome($themsg);
echo "</div>";
}
echo "</div>";

  // ====================// 
 // End Edit Member Page//
// ====================//

  // =========================// 
 // Start Update Member Page//
// ========================//
}elseif($home == 'Update'){

echo "<div class = 'container text-center'>";
echo "<h2 class = 'text-center'>Update Member</h2>";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  // Upload Variables
$avatarname  = $_FILES['up_img']['name'];
$avatarsize  = $_FILES['up_img']['size'];
$avatartemp  = $_FILES['up_img']['tmp_name'];
$avatartype  = $_FILES['up_img']['type'];

// List Of Allowed File Typed To Upload
$avatarallowedex = array("jpeg","jpg","png","gif");
$avatarex = explode(".", $avatarname );
$srt_s = strtolower(end($avatarex));

$id          = $_POST['userid'];
$user        = $_POST['username'];
$email       = $_POST['email'];
$full        = $_POST['fullname'];


// Track Password
$pass = '';
if(empty($_POST['new-password'])){
$pass =  $_POST['old-password'];
}
else{
$pass = sha1($_POST['new-password']);
}

$formerror =array();
if(strlen( $user ) < 4){
$formerror[] ='Username Cant Be Less The 4 Characters ';
}
if(empty( $user )){
$formerror[] ='Username Cant Be Empty ';
}
if(empty($email )){
$formerror[] ='Email Cant Be Empty ';
}
if(empty($full )){
$formerror[] ='FullName Cant Be Empty ' ;
}
if($avatarsize > 4194304){
  $formerror[] ='Avatar Cant Be Larger Than 4MB';
  }
  if(!empty($avatarname)&&!in_array($srt_s,$avatarallowedex)){
  $formerror[] ='This Extension Is Not Allowed';
  }
  if(empty($avatarname ) ){
    $formerror[] ='Avatar Is Required';
    }
// LOOP INTO Array
foreach($formerror as $erro){
echo  "<div class= 'alert alert-danger'>" .$erro .'</div>' ; 

}
if(empty($formerror)){
  $avatar= rand(0, 10000000000) .'_'. $avatarname;
  move_uploaded_file($avatartemp ,"upload\avatar\\". $avatar );

  $stmt2= $coon->prepare("SELECT * From users WHERE username = ? AND userid != ? ");
  $stmt2->execute(array($user, $id));
  $count= $stmt2->rowCount();
  if($count == 1){
  $themsg = "<div class = 'alert alert-danger' >Sorry This name is used</div>";
    redirecthome($themsg,'back');
  }else{
// Update The Database
$stmt = $coon->prepare("UPDATE users SET username = ? , email = ? , fullname = ? , password = ? , u_img = ? WHERE userid = ? ");
$stmt->execute(array($user, $email, $full,$pass, $avatar ,$id));
// Echo Message
$themsg = "<div class= 'alert alert-success'>"   .$stmt->rowCount() .  'Save Update</div>';
redirecthome($themsg , 'back');
}
}

}else{
$themsg = '<div class = "alert alert-danger">Sorry You Cant Browse This Page</div>';
redirecthome($themsg);
}
echo '</div>';

  // ======================// 
 // End Update Member Page//
// ======================//

  // ========================// 
 // Start Delete Member Page//
// ========================//

}elseif($home == 'Delete'){
echo "<h2 class = 'text-center'>Delete Member</h2>";
echo "<div class = 'container text-center'>";

$userid = (isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']): 0);

$check =checkusername('userid', 'users',$userid);
if(isset($check) > 0){

$stmt=$coon->prepare("DELETE FROM users WHERE userid = :zuser");
$stmt->bindparam(":zuser" ,$userid);
$stmt->execute();
$themsg = "<div class= 'alert alert-success'>" . $stmt->rowCount() .  'Deleted successfully</div>';
redirecthome($themsg ,'back');
}else{
$thermsg = "<div class = 'alert alert-danger>This ID Is Not Exist</div>";
redirecthome($themsg);
}
echo "</div>"; 

  // ======================// 
 // End Delete Member Page//
// ======================//

  // ==========================// 
 // Start Activate Member Page//
// ==========================//
}elseif($home == 'Activate'){
echo "<h2 class = 'text-center'>Activate Member</h2>";
echo "<div class = 'container text-center'>";

$userid = (isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']): 0);

$check =checkusername('userid', 'users',$userid);
if(isset($check) > 0){

$stmt=$coon->prepare("UPDATE users SET regstatus = 1 WHERE userid = ?");
$stmt->execute(array($userid));
$themsg = "<div class= 'alert alert-success'>" . $stmt->rowCount() .  'The User Has Been Successfully Activated</div>';
redirecthome($themsg,'back' );
}else{
$thermsg = "<div class = 'alert alert-danger>This ID Is Not Exist</div>";
redirecthome($themsg);
}
echo "</div>"; 

  // ========================// 
 // End Activate Member Page//
// ========================//

}
include $tmp . 'footer.php';


}else{
header('Location:index.php');
exit();
}
