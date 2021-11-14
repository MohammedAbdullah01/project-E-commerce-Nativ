<?php
session_start();
$pagetitle = "Items";
include "init.php";
if(isset($_GET['page']) && is_numeric($_GET['page'])){
$item =  intval($_GET['page']);

$c_parent = getcate("*", "categories", "Where id = {$item}");
?>
<div class="container">
  <h2 class="text-center"><?php echo $c_parent ['name']?></h2>
<div class="row">
<?php
$getitems =getall("*" , "items" , "where cat_id = {$item}" , "AND approve = 1 ", "item_id", "DESC");
if(! empty($getitems)){
foreach($getitems as $item){
?>
<div class=" col-lg-3 col-md-4 col-sm-6">
<div class="card">
<span class="price">$<?php echo  $item['price'];?></span>
<?php
if(! empty($item['uplo_avatar'])){
?>
<img src="admin/upload/avatar_item/<?php echo $item['uplo_avatar']?>" class="card-img-top" alt="...">
<?php
}else{?>
<img src="admin/upload/avatar_item/product-default.png" class="card-img-top" alt="...">
<?php
}
?>
<div class="card-body">
<h5 class="card-title"><?php echo $item['iname'] ?></h5>
<p class="card-text"><?php echo $item['description'];?></p>
<div class="date"><?php echo $item['add_date'];?></div>
<a href="items.php?itemid=<?php echo $item['item_id'];?>" class="btn btn-primary">More</a>
</div>
</div>
</div>
<?php

}
}else{
echo "<div class = 'alert alert-warning text-center'>There Are No Items To Display?</div><hr>";
}

}else{?>
<script>
window.location.href="index.php";
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
