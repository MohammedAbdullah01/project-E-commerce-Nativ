<?php
session_start(); 
$pagetitle= 'Items';
include 'init.php';

if(isset($_GET['itemid']) && is_numeric($_GET['itemid'])){
$itemid = intval($_GET['itemid']);

if(isset($_POST['rating'])){
  $rateing = filter_var($_POST['rating'] , FILTER_SANITIZE_NUMBER_INT) ;
 $r=$coon->prepare("UPDATE items SET rating = IF(rating = 0 , ? ,rating + $rateing)  WHERE item_id = $itemid");
 $r->execute(array($rateing));
}


// Select All Data Is Userid 
$stmt  =$coon->prepare("SELECT items.*, categories.name , users.username FROM items 
INNER JOIN categories ON categories.id = items.cat_id
INNER JOIN users ON users.userid = items.member_id
WHERE item_id = ? AND approve = 1");
$stmt ->execute(array($itemid));
$count = $stmt->rowCount();
$item  = $stmt->fetch();

if($count > 0){?>

<h2 class="text-center"><?php echo $item['name']; ?></h2>
  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
  </svg> -->
<div class="container item_card">
<div class="row ">
<div class="card  item-data">
<div class="row">
<div class="offset-md-1 col-md-3">
<?php
if(! empty($item ['uplo_avatar'])){
?>
<img src="admin/upload/avatar_item/<?php echo $item ['uplo_avatar'] ?>" class="card-img-top" alt="...">
<?php
}else{?>
<img src="admin/upload/avatar_item/product-default.png" class="img-thumbnail" alt="...">
<?php
}
?>
</div>
<div class=" col-md-6 ">
<div class="card-body">
<h3><?php  echo $item ['iname'] ?></h3>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon2">Description: <?php echo $item ['description'] ?></span>
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16">
<path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zM2 10.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
</svg>Date: <?php echo $item ['add_date'] ?>
</span>
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>Made: <?php echo $item ['country'] ?>
</span>
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
<path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
<path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
</svg>Price: <?php echo '$'. $item['price'] ?>
</span>
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
<path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
<path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z"/>
</svg>Category:<a class="link-item" href="all items.php?page=<?php echo $item['cat_id'] ?>"><?php echo $item['name'] ?></a>
</span>
</div>
<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>Added By:<a class="link-item" href="p.php?itemid=<?php echo $item['member_id'] ?>"> <?php echo $item['username'] ?></a>
</span>
</div>

<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-star-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.178.178 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.178.178 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.178.178 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.178.178 0 0 1-.134-.098L8.16 4.1z"/>
</svg>Tags:
<?php
$h_tag = explode("#", $item['tags']);

foreach($h_tag as $tag){
if(! empty ($tag)){
$tag = str_replace("" , "  " , $tag);
?>

<a class="link" href="tag.php?name=<?php echo $tag ?>"> <?php echo "#" . $tag ?></a>

<?php
}
}

?>
</span>
</div>
<!-- Button Add To Card -->
<!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
<a href="#" class="btn btn-primary" type="button">Purchase</a>
<a href="#" class="btn btn-primary" type="button" >Add To Cart</a>
</div> -->
</div>
</div>
</div>
</div>
</div>
</div>

<?php 


if(isset($_SESSION['user'])){

  ?>
<div class="container">
<form action="items.php?itemid=<?php echo $item['item_id']?>" method="POST">
<!-- Start Star Rating -->
<div class="rating">
<center>
<h3 >Add a Review</h3>
<div id="rateYo"></div><br>
<input type="hidden" name="rating" id="rating">
</center>
</div>
<!-- End Star Rating -->
<div class="row">
<div class="col-md-offset-3">
<div class="add-comment">
<h3 class="text-center">Add Your Comment</h3>

<textarea class="form-control" required name="comment" ></textarea>
<div class="d-grid gap-2 col-md-3 mx-auto">
<button class="btn btn-primary" type="submit" >Add Comment</button>
</div>
</form>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$comment =filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
$itemid = $item['item_id'];
$userid = $_SESSION['uid'];
if(empty($comment)){

}
if(! empty($comment)){

$stmt= $coon->prepare("INSERT INTO comments(comment, activation , c_date, item_id, user_id)
VALUES(:zcomment, 0, now(), :zitemid , :zuserid)");
$stmt->execute(array(
'zcomment' => $comment,
'zitemid' => $itemid,
'zuserid' => $userid
));
if($stmt){
echo "<div class = 'alert alert-success text-center'> Comment And Rating Have Been Successfully Added </div>" ;
}
}else{
echo "<div class = 'alert alert-danger text-center '> Sorry, I Have To Write A Comment</div>" ;
}
}
?>
</div>
</div>

<?php }
else{
echo "<div class= 'alert alert-danger text-center'><a href= 'login.php'>Login</a> Or <a href= 'login.php'> Register</a>  To Added Comments Or Rating</div>";
}
?>
<hr>
<?php
$stmt=$coon->prepare("SELECT comments.*,users.*
FROM comments 
INNER JOIN users ON users.userid = comments.user_id 
WHERE item_id = ? AND activation = 1
ORDER BY c_id DESC");
$stmt->execute(array($item['item_id']));
$comments=$stmt->fetchAll();
?>

<?php
if(! empty($comments)){
foreach($comments as $com){?>
<div class="box-comment">
<div class = 'row'>
<div class = 'col-md-2 '>
<img src='admin/upload/avatar/<?php echo $com['u_img'] ?>' class='img-thumbnail'>
<h3><?php echo $com['username']?></h3> 
</div>

<div class = 'col-md-6'>
<p class="lead"><?php echo $com['comment'] ?></p>
</div>
<div class = 'col-md-4'> 
<p class="date"><?php echo $com['c_date']?></p>
</div>
</div>
</div>
<hr>
<?php }
}else{
echo "<div class= 'alert alert-success text-center'>There Is No Comments</div>";
}
?>

</div>
</div>
<?php
} else{
echo "<div class= 'alert alert-danger text-center'>There Is No ID </div>";
}
} else{
?>
<script>
window.location.href="index.php";
</script>
<?php
}

include $tmp  ."footer.php";

