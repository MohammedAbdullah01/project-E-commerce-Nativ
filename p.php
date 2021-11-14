<?php
session_start(); 
$pagetitle= 'User Items';
include 'init.php';
$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']):0;



// Select All Data Is Userid 
$stmt  =$coon->prepare("SELECT items.*, users.* FROM items 
                        INNER JOIN users ON users.userid = items.member_id
                        WHERE userid = ? AND approve = 1");
$stmt ->execute(array($itemid));
$count = $stmt->rowCount();
$item  = $stmt->fetchAll();
if($count > 0){?>
<div class="container p_profile_item">
  <div class="row">

<?php

foreach($item as $items){

?>
  <div class=" col-lg-3 col-md-4 col-sm-6">
    <div class="card">
      <span class="price">$<?php echo $items['price'];?></span>
      <img src="admin/upload/avatar_item/<?php echo $items['uplo_avatar']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $items['iname'] ?></h5>
          <p class="card-text"><?php echo $items['description'];?></p>
          <div class="date"><?php echo $items['add_date'];?></div>
          <a href="items.php?itemid=<?php echo $items['item_id'];?>" class="btn btn-primary">More</a>
      </div>
    </div>
  </div>
<?php
}
?>
</div>
</div>
<?php
}else{
  ?>
  <script>
  window.location.href="index.php";
</script>
<?php
}
include $tmp  ."footer.php";