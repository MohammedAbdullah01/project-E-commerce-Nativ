<?php
session_start();
$pagetitle = "Categories";
include "init.php";
if(isset($_GET['page']) && is_numeric($_GET['page'])){
$category =  intval($_GET['page']);
?>
<div class="container">
<div class="row">
<?php
$c_parent = getall("*","categories","where parent = {$category}","","id","ASC" );
if(! empty($c_parent)){
foreach($c_parent as $cat){?>
<div class=" col-lg-3 col-md-4 col-sm-6">
<div class="card">
<img src="admin/upload/avatar/<?php echo $cat['cat_avater']?>" class="card-img-top" alt="...">
<div class="card-body">
<h5 class="card-title"><?php echo $cat['name'] ?></h5>
<a class="btn btn-primary"  href="all items.php?page=<?php echo $cat['id']?>">More</a>
</div>
</div>
</div>
<?php
}

}else{
echo "<div class = 'alert alert-warning text-center'>There Are No Categories To Display?</div><hr>";
}
}else{?>
<script>
window.location.href="index.php";
</script>
<?php
}
?>
</div>
</div>

<?php
include $tmp  ."footer.php";
?>
