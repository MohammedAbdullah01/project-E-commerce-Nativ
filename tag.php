<?php
session_start();
$pagetitle = "Common Elements";

include "init.php";?>

<div class="container">
  
  <div class="row">
<?php
if(isset($_GET['name']) && ! empty($_GET['name'])){
  $tag = filter_var($_GET['name'], FILTER_SANITIZE_STRING );?>
  <h2 class= "text-center">#<?php echo $tag ?></h2>
  <?php
$getitems =getall("*" , "items" , "where tags Like '%$tag%'" , "AND approve = 1 ", "item_id" , "DESC");
foreach($getitems as $item){
?>
  <div class=" col-lg-3 col-md-4 col-sm-6">
    <div class="card">
      <span class="price">$<?php echo $item['price'];?></span>
      <img src="admin/upload/avatar_item/<?php echo $item['uplo_avatar']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $item['iname'] ?></h5>
          <p class="card-text"><?php echo $item['description'];?></p>
          <div class="date"><?php echo $item['add_date'];?></div>
          <a href="items.php?itemid=<?php echo $item['item_id'];?>" class="btn btn-primary">More</a><hr>
      </div>
    </div>
  </div>


<?php


}
}else{?>
<script>
  window.location.href= 'logout.php'
</script>
<?php
  exit();
}
?>
</div>
</div>

<?php
include $tmp  ."footer.php";
?>
