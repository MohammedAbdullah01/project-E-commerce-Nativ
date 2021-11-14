<?php
session_start(); 
$pagetitle= 'My Profile';
include 'init.php';
if(isset($_SESSION['user'])){
     $stmtu=$coon->prepare("SELECT * FROM users WHERE userid = ?");
     $stmtu ->execute(array($_SESSION['uid']));
     $user =$stmtu->fetch();
     $count = $stmtu->rowCount();
     if($count > 0){
?>

<div class="images ">

<div class="img-profile">
  <?php
  if(! empty($user['p_img'])){?>
  
  
  <img src="admin/upload/avatar_p/<?php echo $user['p_img'] ?>"  class="img-fluid" alt="...">
<?php
}else{?>
  <img src="admin/upload/avatar_p/2257.jpg "  class="img-fluid" alt="...">
  
<?php
}
?>
</div>

<div class="img_user text-center ">
  <?php
  if(!empty($user['u_img'])){?>
 
  <img src="admin/upload/avatar/<?php echo $user['u_img']; ?>" class="rounded"   alt="...">
<?php
}else{?>
  <img src="admin/upload/avatar/Defualte.jpg" class="rounded imge_u"   alt="...">
  <?php
}?>
<h2 class="text-center"><?php echo $user['fullname']; ?></h2>
  </div>


  
</div>



<div class="states">
<div class="container ">
<ul class="list-group">
<li class="list-group-item header" aria-current="true">My Information
  <a href="edit_user.php?EditProfile=Edit" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg> Edit Information</a>
</li>
<li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg><?php echo ' '. $user['username']; ?></li>
<li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-open-fill" viewBox="0 0 16 16">
<path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l6.709 3.933L8 8.928l1.291.717L16 5.715V5.4a2 2 0 0 0-1.059-1.765l-6-3.2zM16 6.873l-5.693 3.337L16 13.372v-6.5zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516zM0 13.373l5.693-3.163L0 6.873v6.5z"/>
</svg><?php echo ' '. $user['email']; ?></li>
<li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
<path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
</svg><?php echo ' '. $user['date']; ?></li>

<li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
</svg>
<?php 
if(! empty($user['fullname'])){
echo ' '. $user['fullname']; 
}else{
  echo "<strong>Empty</strong>";
}
?>
</li>

<li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg>
<?php 
if(! empty($user['mopile_number'])){
echo ' '. $user['mopile_number']; 
}else{
  echo "<strong>Empty</strong>";
}
?>
</li>

<li class="list-group-item">
<?php 
if($user['gander']== 0){
  echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gender-trans" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1.707L3.5 2.793l.646-.647a.5.5 0 1 1 .708.708l-.647.646.822.822A3.99 3.99 0 0 1 8 3c1.18 0 2.239.51 2.971 1.322L14.293 1H11.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 0 1-3.05-5.814l-.95-.949-.646.647a.5.5 0 1 1-.708-.708l.647-.646L1 1.707V3.5a.5.5 0 0 1-1 0v-3zm5.49 4.856a3 3 0 1 0 5.02 3.288 3 3 0 0 0-5.02-3.288z"/>
</svg><strong>Empty</strong>';

}elseif($user['gander']== 1){
  echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
</svg> Male ';
}elseif($user['gander']== 2){
  echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
</svg> Female ';
}
?>
</li>


</ul>

<ul class="list-group ads">
<li class="list-group-item header" aria-current="true">My Items
<a href="newads.php" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> New Items</a>
</li>
<div class="row">
<?php
$getitem = getall("*","items","where member_id = {$user['userid']}","" ,"item_id");
if(! empty($getitem)){

foreach($getitem as $item){
  ?>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="card">
<span class="price">$<?php echo $item['price'];?></span>
<span class="aprrove"> <?php if($item['approve']== 0){echo 'Waiting For Approval';}?></span>
<img src="admin/upload/avatar_item/<?php echo $item['uplo_avatar']?>" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title"><?php echo $item['iname'] ?></h5>
<p class="card-text"><?php echo $item['description'];?></p>
<div class="date"><?php echo $item['add_date'];?></div>
<?php

?>
<a href="items.php?itemid=<?php echo $item['item_id'];?>" class="btn btn-primary">More</a>
<a href="edit_user.php?EditProfile=Delete&itemid=<?php echo $item['item_id'];?>" class="btn btn-danger confirm">Delete</a>
<?php

?>
</div>
</div>
</div>
<?php
}
}else{
  echo "<ul><div class ='alert alert-danger text-center'>There are no Items to display <a href = 'newads.php'>Creat Ads</a> </div></ul>";
}
?>
</ul>
</div>
</div>
<?php
 }else{?>
   <script>
  window.location.href="index.php";
 </script>
 <?php
 }


}else{?>
  <script>
   window.location.href="index.php";
 </script>
 <?php
}
include $tmp  ."footer.php";

?>