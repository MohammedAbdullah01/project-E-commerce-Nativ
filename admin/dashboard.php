<?php
session_start();

$pagetitle = 'Dashboard'; //Titel Name Page
if(isset($_SESSION['username'])){

include 'init.php';
$latestevents    = "2"; // Number Of List Groub
$getlates        = getallfrom("*","users","where groupid != 1","AND regstatus = 0","userid","DESC"); // Function Latest Items ['Users', 'Items,"comments']
$getlates_item   = getallfrom("*","items","where approve = 0","","item_id");  // Function Latest Items ['Users', 'Items,"comments']

?>

<div class="container home-stat text-center">
<h2 class="text-center">Dashboard</h2>
<div class="row">
<div class="col-md-3">
<div class="stat st-members">
<svg xmlns="http://www.w3.org/2000/svg" width="95" height="95" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
</svg>
<div class="info">
Total Member
<span><a href="members.php"> <?php echo checkcount('userid', 'users'); ?> </a></span>
</div>
</div>
</div>

<div class="col-md-3">
<div class="stat st-waiting">
<svg xmlns="http://www.w3.org/2000/svg" width="95" height="95" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
<path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg>
<div class="info">
Pending Member
<span><a href="members.php?home=Manage&page=Activate"> <?php echo checkusername('regstatus','users', 0); ?></a></span>
</div>
</div>
</div>

<div class="col-md-3">
<div class="stat st-products">
<svg xmlns="http://www.w3.org/2000/svg" width="95" height="95" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
<path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
<div class="info">
Total Of Items
<span><a href="iteam.php"> <?php echo checkcount('item_id', 'items'); ?> </a></span>
</div>
</div>
</div>

<div class="col-md-3">
<div class="stat st-coments">
<svg xmlns="http://www.w3.org/2000/svg" width="95" height="95" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
<path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
</svg>
<div class="info">
Total Comments
<span><a href="comments.php"> <?php echo checkcount('c_id', 'comments'); ?> </a></span>
</div>
</div>
</div>
</div>
</div>

<div class="states">
<div class="container">
<div class="row">
<ul class="list-group">

<li class="list-group-item disabled" aria-disabled="true"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
<path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
<path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>
Latest <?php echo "<strong>". $latestevents."</strong>"  ?> Member Registered</li>
<li class="list-group-item">
<ul class= "list-unstyled latest-users">
<?php 
if(! empty($getlates)){
 foreach($getlates as $user){
    
echo  '<li>';
echo "<span class = 'username-dash'>" . $user['username']. "</span>";
echo   "<a href='members.php?home=Edit&userid=" .$user['userid'] ."'>";
echo     "<span class='btn btn-success'>Edit</span>";

echo  "<a  href='members.php?home=Activate&userid=" . $user['userid'] . "'class='btn btn-secondary'>Activate</a>";
echo   "</a>";
echo  '</li>';
} 
}else{
    echo "<div class = 'container text-center' >";
    echo "<div class= 'alert alert-success'>-Waiting For New Users To Be Approved</div>";
    echo "</div>";
}

?>
</ul>
</li>
</ul>
<ul class="list-group float-none">
<li class="list-group-item disabled" aria-disabled="true"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
<path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
Latest <?php echo "<strong>". $latestevents."</strong>" ?> Items</li>
<li class="list-group-item">
<ul class= "list-unstyled latest-users"> 
   <?php 
if(!empty($getlates_item)){
foreach($getlates_item as $item){

echo  '<li>';
echo "<span class = 'username-dash'>" . $item['iname'] . "</span>";
echo "<a href='iteam.php?home=Edit&itemid=" .$item['item_id'] ."'>";
echo "<span class='btn btn-success'>Edit</span>";
echo "</a>";

echo "<a href='iteam.php?home=Approve&itemid=" .$item['item_id'] ."'>";
echo "<span class='btn btn-secondary'>Approve</span>";
echo "</a>";
echo '</li>';
} 


}else{
    echo "<div class = 'container text-center' >";
    echo "<div class= 'alert alert-success'>-Waiting For New Items  To Be Approved</div>";
    echo "</div>";
} 
?>
</ul>
</li>
</ul>

<ul class="list-group ">
<li class="list-group-item disabled" aria-disabled="true"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
<path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
</svg>
Latest <?php echo "<strong>". $latestevents."</strong>"  ?> The Last Comments</li>
<li class="list-group-item">
<ul class= "list-unstyled latest-users">
<?php  
$stmt  = $coon->prepare("SELECT comments.*, items.iname ,users.username FROM comments 
INNER JOIN items  ON items.item_id = comments.item_id
INNER JOIN users ON users.userid = comments.user_id 
WHERE activation = 0 ORDER BY c_date DESC LIMIT 5
");
$stmt->execute();
$rows=$stmt->fetchall();
if(!empty($rows)){
foreach($rows as $c_name){

echo '<li>';
echo '<div class = "c-box">';
echo "<span class = 'username-dash'>". $c_name['username'] . "<p class = 'item-dash'>". $c_name['iname'] . "</p>" ."</span>";   
echo "<p class = 'prag'>" .$c_name['comment'] . "</p>";
echo "</div>";
echo "<a href='comments.php?home=Edit&commentid=" .$c_name['c_id']. "'>";
echo "<span class='btn btn-success'>Edit</span>";
echo "<a  href='comments.php?home=Approve&commentid=" .$c_name['c_id'] . "'><span class='btn btn-secondary'>Approve</span></a>";
echo "</a>";
echo '</li>';
}
}else{
  echo "<div class = 'container' >";
  echo "<div class= 'alert alert-success  text-center'> -Waiting for a comment to be added for approval</div>";
  echo "</div>";
}

?>
</ul>
</li>
</ul>
</div>
</div>
</div>
<?php

include $tmp . 'footer.php';
}

else{
header('Location:index.php');
exit();
}

?>
