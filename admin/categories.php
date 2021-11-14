<?php

//===================
//===Category Page===
//===================

ob_start(); //Output Buferring Start
session_start();
$pagetitle='Categories';
// Creat The Page[Manage | Edit |Update |Add | Delete | Insert |Stats]

if(isset($_SESSION['username'])){

include 'init.php';


$home= isset($_GET['home']) ? $_GET['home']: 'Manage';

if($home  == 'Manage'){
$sort='ASC';
$sort_arr = array('ASC','DESC');
if(isset($_GET['sort']) && in_array($_GET['sort'], $sort_arr )){
$sort = $_GET['sort'];
}
$getcat= getallfrom("*","categories","where parent = 0","","id");
?>
<h2 class="text-center">Manage Categories</h2>
<?php
if(! empty($getcat)){
?>
<div class="container category">
<div class="ordering">
<span>Ordering:</span>
<a class="<?php if($sort == 'ASC') {echo 'active';} ?>" href="?sort=ASC ">ASC </a>|
<a class="<?php if($sort == 'DESC'){echo 'active';} ?>" href="?sort=DESC">DESC </a>
</div>
<table class="table  table-dark table-hover">
<thead>
<tr>
<th scope="col">Name</th>
<th scope="col">Section Description</th>
<th scope="col">Visibility</th>
<th scope="col">Allow_Comments</th>
<th scope="col">Allow_Ads</th>
<th scope="col">Control</th>
</tr>
</thead>
<?php
foreach($getcat as $cate){
?>
<tr>
<th>
<h6>
<?php echo   $cate['name'] ;?>
</h6><hr>  
<?php 
$get= getallfrom("*","categories","where parent = {$cate['id']}","","id");
foreach($get as $parent){?>
<ul class='list-unstyled'>
<li class="text-start"><a  href='categories.php?home=Edit&catid=<?php echo $parent['id'] ?>'><?php echo $parent['name']?></a>
<a href='categories.php?home=Delete&catid= <?php echo $parent['id'] ?>' class='btn btn-danger btn-sm  chill_delete confirm'>Delete</a>
</li>
</ul>
<?php
}?>
</th>

<th>
<p> 
<?php echo $cate['description'] ?>
</p>
</th>

<?php
if( $cate['visibility']     == 1){ echo "<th class ='visibility'>Hidden</th>";}     else{ echo "<th class ='novisibility'></th>";}
if( $cate['allow_comments'] == 1){ echo "<th class ='visibility'>Not Enabled</th>";}else{ echo "<th class ='novisibility'></th>";}
if( $cate['allow_ads']      == 1){ echo "<th class ='visibility'>Not Enabled</th>";}else{ echo "<th class ='novisibility'></th>";}
?>
<th>
<a  href='categories.php?home=Edit&catid=<?php echo  $cate['id'] ?> 'class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
</svg>
Edit</a>
<a  href='categories.php?home=Delete&catid= <?php echo $cate['id'] ?> 'class='btn btn-danger confirm'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
Delete</a>
</th>
<?php
}
?>
</tr>
</table>

<a href="categories.php?home=Add" class="btn btn-primary">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg> New Categories</a>
</div>
<?php
}else{
echo "<div class = 'container text-center' >";
echo "<div class= 'alert alert-success'>There Are No Users</div>";
?>
<a href="categories.php?home=Add" class="btn btn-primary">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg> New Categories</a>
</div>
<?php echo "</div>";
}
}elseif($home == 'Add'){?>

<h2   class = "text-center">Add New Categoris</h2>
<div  class="container">
<form class="Add-cat" action="?home=Insert" method="post">
<div  class="input-group mb-3">

<!-- Start Name -->
<span class="input-group-text">Name</span>
<input type="text" class="form-control" name="name"  required="required" autocomplete="off"
placeholder="Name Of The Category">
</div>
<!-- End Name -->

<!--Start Descreption-->
<div  class="input-group mb-3">
<span class="input-group-text"> Descreption</span>
<input type="text" class="form-control" name="desc"  required="required" autocomplete="off"
placeholder="Product Description"/>
</div>
<!--End Descreption-->

<!--Start Parent-->
<div  class="input-group mb-3">
<span class="input-group-text">Parent?</span>
<select  class="form-select" name="parent" required>
<option value="0">None</option>
  <?php
$get_cats = getallfrom("*","categories","where parent = 0","","id");
foreach($get_cats as $c){?>

  <option value="<?php echo $c['id']?>"> <?php echo $c['name']?></option>
  <?php
}
?>
</select>
</div>
<!--End Parent-->

<!--Start Ordering-->
<div class="input-group mb-3">
<span class="input-group-text">Ordering</span>
<input type="text" class="form-control" name="order" 
placeholder="Number To The Categories">
</div> 
<!--End Ordering-->  

<!--Start Hides-->
<div class="input-group mb-3">
<span class="input-group-text">Visibility</span>

<div class="moooooo">
<div class="form-check">

<input class="form-check-input" type="radio"  name="hides" value="1" id="hid-yes" checked>
<label class="form-check-label" for="hid-yes">Yes</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio"  name="hides" value="2" id="hid-no">
<label class="form-check-label" for="hid-no">No</label>
</div>
</div>
</div>

<!--End Hides-->

<!--Start Allow_Comments-->
<div class="input-group mb-3">
<span class="input-group-text">Allow Comments</span>

<div class="moooooo">
<div class="form-check">

<input class="form-check-input" type="radio"  name="comment" value="1" id="com-yes" checked>
<label class="form-check-label" for="com-yes">Yes</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio"  name="comment" value="2" id="com-no">
<label class="form-check-label" for="com-no">No</label>
</div>
</div>
</div>
<!--End Allow_Comments-->

<!--Start Allow_Ads-->
<div class="input-group mb-3">
<span class="input-group-text">Allow Ads</span>

<div class="parent">
<div class="form-check">

<input class="form-check-input" type="radio"  name="ads" value="1" id="ads-yes" checked>
<label class="form-check-label" for="ads-yes">Yes</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio"  name="ads" value="2" id="ads-no">
<label class="form-check-label" for="ads-no">No</label>
</div>
</div>
</div>
<!--End Allow_Ads-->

<!--Start Button-->    
<input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Add Categoris" >
<!--Start Button-->

</form>
</div>

<?php


}elseif($home == 'Insert'){   

if($_SERVER['REQUEST_METHOD'] == 'POST'){

echo "<h2 class = 'text-center'>Add Categories</h2>";
echo "<div class = 'container text-center'>";

$name     = $_POST['name'];
$desc     = $_POST['desc'];
$parent   = $_POST['parent'];
$order    = $_POST['order'];
$hides    = $_POST['hides'];
$comments = $_POST['comment'];
$ads      = $_POST['ads'];

// Start function Check To Categories In The Database
$check = checkusername('name','categories',$name);
$formerror = array();
if($check == 1 ){
$formerror[] = $themsg = "<div class = 'alert alert-danger' >Sorry This Category is used</div>";
redirecthome($themsg,'back');
}
if(empty($name)){
$formerror[] ='Name Cannot Be Empty ';
}
if(empty($desc)){
$formerror[] ='Description Cannot Be Empty ';
}
if(empty($hides)){
$formerror[] ='Hides Cannot Be Empty ';
}
if(empty($comments)){
$formerror[] ='Comments Cannot Be Empty ';
}
if(empty( $ads )){
$formerror[] ='Ads Cannot Be Empty ';
}
// LOOP INTO Array
foreach($formerror as $erro){
echo  "<div class= 'alert alert-danger'>" .$erro .'</div>' ; 
}
if(empty($formerror)){




// Insert User The Database                                                        //Varibal
$stmt =$coon->prepare("INSERT INTO 
categories(name , description , parent , ordering , visibility , allow_comments , allow_ads)
value     (:zname , :zdesc , :zparent ,:zorder , :zhides , :zcomm ,:zads)");

$stmt->execute(array(
'zname'   =>   $name     ,  
'zdesc'   =>   $desc     , 
'zparent' =>   $parent   , 
'zorder'  =>   $order    ,  
'zhides'  =>   $hides    , 
'zcomm'   =>   $comments ,  
'zads'    =>   $ads 
));

// Echo Message
$themsg = "<div class= 'alert alert-success'>"   .$stmt->rowCount() .  'Save Add Category</div>';
redirecthome($themsg , 'back' );
//End Function To Check Username In Database


}else{
echo "<div class ='container text-center'>";
$themsg ="<div class = 'alert alert-danger'>Sorry You Cant Browse The Page Directly</div>";
redirecthome($themsg , 'back');     
echo "</div>";
}
echo "</div>";
}


}elseif($home == 'Edit'){ 

// Check If Request User Id is IT Numeric
$cateid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']): 0;

// Select All Data Is Userid 
$stmt  =$coon->prepare("SELECT * FROM categories WHERE id = ?");
$stmt ->execute(array($cateid));
$row   = $stmt->fetch();
$count = $stmt->rowCount();

if($count > 0){?>


<div  class="container">
<h2   class = "text-center">Edit Categoris</h2>
<form class="Add-cat" action="?home=Update" method="post">
<input type="hidden" name="catid" value="<?php echo $cateid ?>" >
<div  class="input-group mb-3">

<!-- Start Update Name -->
<span class="input-group-text">Name</span>
<input type="text" class="form-control" name="name"  required="required" value="<?php echo $row['name'];?>">
</div>
<!-- End Update Name -->

<!--Start Update Descreption-->
<div  class="input-group mb-3">
<span class="input-group-text">Descreption</span>
<input type="text" class="form-control" name="desc" required="required" value="<?php echo $row['description'];?>">
</div>
<!--End Update Descreption-->

<!--Start Update Parent-->
<div  class="input-group mb-3">
<span class="input-group-text">Parent?</span>
<select  class="form-select" name="parent" required>
<option value="0">None</option>
  <?php
$get_cats = getallfrom("*","categories","where parent = 0","","id");
foreach($get_cats as $c){?>

  <option value="<?php echo $c['id']?>" 
  <?php 
  if($row['parent'] == $c['id']){echo "selected";}
    ?>> <?php echo $c['name']?></option>
  <?php
}
?>
</select>
</div>
<!--Start Update Ordering-->
<div class="input-group mb-3">
<span class="input-group-text">Ordering</span>
<input type="text" class="form-control" name="order"  value="<?php echo $row['ordering'];?>">
</div> 
<!--End Update Ordering-->  

<!--Start Update Hides-->
<div class="input-group mb-3">
<span class="input-group-text">Visibility</span>


<div class="form-check">
<input class="form-check-input" type="radio" name="hides"  value='0' <?php if($row['visibility'] == 0){echo 'checked';} ?> id="hid-yes" checked >
<label class="form-check-label" for="hid-yes">Yes</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="hides"  value='1' <?php if($row['visibility'] == 1){echo 'checked';}   ?> id="hid-no">
<label class="form-check-label" for="hid-no">No</label>
</div>

</div>

<!--End Update Hides-->

<!--Start Update Allow_Comments-->
<div class="input-group mb-3">
<span class="input-group-text">Allow Comments</span>
<div class="form-check">
<input class="form-check-input" type="radio" name="comment" value ='0' <?php if($row['allow_comments']== 0){echo 'checked';}?> id="com-yes" required >
<label class="form-check-label" for="com-yes">Yes</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="comment" value ='1' <?php if($row['allow_comments']== 1){echo 'checked';}  ?> id="com-no">
<label class="form-check-label" for="com-no">No</label>
</div>
</div>
<!--End Update Allow_Comments-->

<!--Start Update Allow_Ads-->
<div class="input-group mb-3">
<span class="input-group-text">Allow Ads</span>
<div class="form-check">
<input class="form-check-input" type="radio" name="ads" value ='0' <?php if($row['allow_ads']== 0){echo 'checked';}?>  id="ads-yes" checked >
<label class="form-check-label" for="ads-yes">Yes</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="ads" value ='1' <?php if($row['allow_ads']== 1){echo 'checked';}?>   id="ads-no">
<label class="form-check-label" for="ads-no">No</label>
</div>
</div>
<!--End Update Allow_Ads-->

<!--Start Button-->    
<input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Save Item" >
<!--End Button-->

</form>
</div>
<?php
}else{
echo "<div class = 'container text-center'>" ;
$themsg = "<div class = 'alert alert-danger'>Thres No Such ID</div>";
redirecthome($themsg);
echo "</div>";
}
echo "</div>";



} elseif($home == 'Update'){   

echo "<div class = 'container text-center'>";
echo "<h2 class = 'text-center'>Update Categories</h2>";
if($_SERVER['REQUEST_METHOD'] == 'POST'){


$id      = $_POST['catid'];
$name    = $_POST['name'];
$desc    = $_POST['desc'];
$parent  = $_POST['parent'];
$order   = $_POST['order'];
$hides   = $_POST['hides'];
$comment = $_POST['comment'];
$ads     = $_POST['ads'];


// Update The Database
$stmt = $coon->prepare("UPDATE categories SET  name = ? , description = ?, parent = ?  ,ordering = ? , visibility = ? , allow_comments = ? , allow_ads = ? WHERE id = ? ");
$stmt ->execute(array( $name, $desc, $parent ,$order ,$hides ,$comment ,$ads ,$id));
$count= $stmt->rowCount();
// Echo Message
$themsg = "<div class= 'alert alert-success'>"   .$count .  'Save Item Update</div>';
redirecthome($themsg , 'back');

}else{
$themsg = '<div class = "alert alert-danger">Sorry You Cant Browse This Page</div>';
redirecthome($themsg);
}
echo '</div>';

}elseif($home == 'Delete'){   

echo "<h2 class = 'text-center'>Delete Categories</h2>";
echo "<div class = 'container text-center'>";

$cateid = (isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']): 0);

$check =checkusername('id', 'categories',$cateid);
if(isset($check) > 0){

$stmt=$coon->prepare("DELETE FROM categories WHERE id = :zid"); 
$stmt->bindparam(":zid" ,$cateid);
$stmt->execute();
$themsg = "<div class= 'alert alert-success'>" . $stmt->rowCount() . 'Deleted successfully</div>';
redirecthome($themsg,'back');
}else{
echo "<div class = 'container'>";
$thermsg = "<div class = 'alert alert-danger>This ID Is Not Exist</div>";
redirecthome($themsg);
echo "</div>";
}
echo "</div>"; 

}elseif($home == 'Activate'){   

}

include $tmp . 'footer.php';

}else{
header('Location:index.php');
}

ob_end_flush(); //Release The Output
