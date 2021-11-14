<?php

//===================
//===Items Page===
//===================

ob_start(); //Output Buferring Start
session_start();
$pagetitle='Items';
// Creat The Page[Manage | Edit |Update |Add | Delete | Insert |Stats]

if(isset($_SESSION['username'])){

include 'init.php';


$home= isset($_GET['home']) ? $_GET['home']: 'Manage';

if($home  == 'Manage'){

$stmt=$coon->prepare("SELECT items.* ,categories.name , users.username FROM items
INNER JOIN categories ON categories.id = items.cat_id
INNER JOIN users ON users.userid = items.member_id ORDER BY item_id DESC");
$stmt->execute();
$items=$stmt->fetchAll();?>
<h2 class="text-center">Manage Items</h2>
<?php
if(! empty($items)){?>



<div class="container">
<table class="table data_table  table-dark table-hover">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">Avatar</th>
<th scope="col">Name</th>
<th scope="col">Description</th>
<th scope="col">Price</th>
<th scope="col">Adding Date</th>
<th scope="col">Category</th>
<th scope="col">UserName </th>
<th scope="col">Control</th>
</tr>
</thead>
<?php
foreach($items as $item){?>
<tr>
<th><?php echo  $item['item_id']     ?></th>
<th> 
<?php 
if(! empty($item['uplo_avatar'])){?>
<img src="upload/avatar_item/<?php echo  $item['uplo_avatar']?>" alt="">
<?php
}else{?>
<img src="upload/avatar_item/product-default.png" alt="">

<?php
}
?>
</th>
<th><?php echo  $item['iname']      ?></th>
<th><?php echo  $item['description']?></th>
<th>$<?php echo  $item['price']     ?></th>
<th><?php echo  $item['add_date']   ?></th>
<th><?php echo  $item['name']       ?></th>
<th><?php echo  $item['username']   ?></th>
<th>
<a  href='iteam.php?home=Edit&itemid=<?php echo $item['item_id']?>' class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
</svg>
Edit</a>
<a  href='iteam.php?home=Delete&itemid=<?php echo $item['item_id']?>' class='btn btn-danger confirm'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
Delete</a>
<?php
if($item['approve']== 0){?>
<a  href='iteam.php?home=Approve&itemid=<?php echo $item['item_id']?>' class='btn btn-secondary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2-circle' viewBox='0 0 16 16'>
<path d='M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z'/>
<path d='M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z'/>
</svg>
Approve</a>
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

<a href="iteam.php?home=Add" class="btn btn-primary">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg> New Item</a>
</div>
<?php
}else{
    echo "<div class = 'container text-center' >";
    echo "<div class= 'alert alert-success'>There Are No Items</div>";?>
    <a href="iteam.php?home=Add" class="btn btn-primary">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
    </svg> New Item</a>
    </div>
    <?php
    echo "</div>";
    }

}elseif($home == 'Add'){?>

<h2   class = "text-center">Add New Item</h2>
<div  class="container">
<form class="Add-cat" action="?home=Insert" method="post">
<div  class="input-group mb-3">

<!-- Start Name -->
<span class="input-group-text">Name</span>
<input type="text" class="form-control" name="name"  required="required" placeholder="Name Of The Item">
</div>
<!-- End Name -->

<!-- Start Description -->
<div  class="input-group mb-3">
<span class="input-group-text">Description</span>
<input type="text" class="form-control" name="desc"  required="required" placeholder="About The Product">
</div>
<!-- End Description -->

<!-- Start price -->
<div  class="input-group mb-3">
<span class="input-group-text">price</span>
<input type="number" class="form-control" name="price"  required="required" placeholder= "Price Of The Item">
</div>
<!-- End price -->

<!-- Start Country -->
<div  class="input-group mb-3">
<span class="input-group-text">Country</span>
<input type="text" class="form-control" name="country"  required="required" placeholder="Country Of The Item">
</div>
<!-- End Country -->

<!-- Start status -->
<div  class="input-group mb-3">
<span class="input-group-text">Status</span>
<select class="form-select" name="status">
<option selected value="0">Choose...</option>
<option value="1">New</option>
<option value="2">Used</option>
</select>
</div>
<!-- End status -->

<!-- Start status -->
<div  class="input-group mb-3">
<span class="input-group-text">Category</span>
<select class="form-select" name="category">
<option selected value="0">Choose...</option>
<?php 
$cats = getallfrom("*","categories","where parent = 0","","id");
foreach($cats as $cate){?>
  <option value= '<?php echo $cate['id']?> '><?php echo $cate['name']?> 
  </option>
  <?php
 
$cats_p = getallfrom("*","categories","where parent = {$cate['id']}","","id");
foreach($cats_p as $parent_cat){?>
 <option class="back_parent text-center" value= '<?php echo $parent_cat['id']?> '><?php echo  $parent_cat['name']?> 
  </option>
  <?php
}
}
?>
</select>
</div>
<!-- End status -->

<!-- Start status -->
<div  class="input-group mb-3">
<span class="input-group-text">Member</span>
<select class="form-select" name="member">
<option selected value="0">Choose...</option>
<?php 
$members = getallfrom("*","users","where regstatus = 1","","userid");
foreach($members as $user){
echo "<option value= '" . $user['userid'] ."'>" . $user['username'] ."</option>";
}

?>  

</select>
</div>
<!-- End status -->

<!-- Start Tags -->
<div  class="input-group mb-3">
<span class="input-group-text">Tags</span>
<input type="text" class="form-control" name="tags"  required="required" placeholder="Type Unique Words To Benefit From Search Engines">
</div>
<!-- End Tags -->

<!--Start Button-->    
<input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Add Item" >
<!--Start Button-->

</form>
</div>

<?php

}elseif($home == 'Insert'){   
if($_SERVER['REQUEST_METHOD'] == 'POST'){

echo "<h2 class = 'text-center'>Add Item</h2>";
echo "<div class = 'container text-center'>";

$name     = $_POST['name'];
$desc     = $_POST['desc'];
$price    = $_POST['price'];
$country  = $_POST['country'];
$status   = $_POST['status'];
$cat      = $_POST['category'];
$member   = $_POST['member'];
$tags     = $_POST['tags'];

$formerror =array();
if(empty($name)){
$formerror[] ='Name Cannot Be </strong> Empty </strong>';
}
if(empty($desc)){
$formerror[] ='Description Cannot Be <strong> Empty </strong>';
}
if(empty($price)){
$formerror[] ='Price Cannot Be <strong> Empty </strong>';
}
if(empty($country)){
$formerror[] ='Country Cannot Be <strong> Empty </strong>';
}
if($status == 0 ){
$formerror[] ='You Must Choose The <strong> Status </strong>' ;
}
if($cat == 0 ){
$formerror[] ='You Must Choose The <strong> Category </strong>' ;
}
if($member == 0 ){
$formerror[] ='You Must Choose The <strong> Member </strong>' ;
}
// LOOP INTO Array
foreach($formerror as $erro){
echo  "<div class= 'alert alert-danger'>" .$erro .'</div>' ; 
}
if(empty($formerror)){

// Start function Check To Username In The Database
$check=checkusername('iname',' items',$name);

if($check == 1){
$themsg = "<div class = 'alert alert-danger' >Sorry This name is used</div>";
redirecthome($themsg,'back');
}else{

// Insert User The Database                                                      
$stmt =$coon->prepare("INSERT INTO  items(iname , description , price , country , status , add_date ,cat_id , member_id , tags)
value(:zname , :zdesc , :zprice , :zcountry , :zstatus , now() , :zcat , :zmember , :ztags )");
$stmt->execute(array(
'zname'   =>  $name,
'zdesc'   =>  $desc ,
'zprice'  =>  $price ,
'zcountry'=>  $country ,
'zstatus' =>  $status,
'zcat'    =>  $cat,
'zmember' =>  $member, 
'ztags' =>  $tags 
));

// Echo Message
$themsg = "<div class= 'alert alert-success'>"   .$stmt->rowCount() .  'Save Items</div>';
redirecthome($themsg , 'back' );
}//End Function To Check Username In Database
}

}else{
echo "<div class ='container'>";
$themsg ="<div class = 'alert alert-danger'>Sorry You Cant Browse The Page Directly</div>";
redirecthome($themsg);     
echo "</div>";
echo "</div>";
}


}elseif($home == 'Edit'){   
// Check If Request User Id is IT Numeric
$itemid = isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']): 0;

// Select All Data Is Userid 
$stmt  =$coon->prepare("SELECT * FROM  items WHERE item_id = ?");
$stmt ->execute(array($itemid));
$item   = $stmt->fetch();
$count = $stmt->rowCount();

if($count > 0){?>

<h2   class = "text-center">Edit Item</h2>
<div  class="container">
<form class="Add-cat" action="?home=Update" method="post">
<div  class="input-group mb-3">

<!-- Start Item ID -->
<input type="hidden" name="item_id"  value="<?php echo $itemid ?>" >
</div>
<!-- End Item ID -->

<!-- Start Name -->
<div  class="input-group mb-3">
<span class="input-group-text">Name</span>
<input type="text" class="form-control" name="name"  required="required" value="<?php echo $item['iname'];  ?>" >
</div>
<!-- End Name -->

<!-- Start Description -->
<div  class="input-group mb-3">
<span class="input-group-text">Description</span>
<input type="text" class="form-control" name="desc"  required="required" value="<?php echo $item['description'];  ?>">
</div>
<!-- End Description -->

<!-- Start price -->
<div  class="input-group mb-3">
<span class="input-group-text">price</span>
<input type="text" class="form-control" name="price" required="required" value=" <?php echo $item['price'];  ?>">
</div>
<!-- End price -->

<!-- Start Country -->
<div  class="input-group mb-3">
<span class="input-group-text">Country</span>
<input type="text" class="form-control" name="country"  required="required"value="<?php echo $item['country'];  ?>">
</div>
<!-- End Country -->

<!-- Start status -->
<div  class="input-group mb-3">
<span class="input-group-text">Status</span>
<select class="form-select" name="status">

<option value="1" <?php if($item['status'] == 1){echo 'selected';} ?>>New</option>
<option value="2" <?php if($item['status'] == 2){echo 'selected';} ?>>Used</option>
</select>
</div>
<!-- End status -->

<!-- Start status -->
<div  class="input-group mb-3">
<span class="input-group-text">Category</span>
<select class="form-select" name="category">

<?php 
$cats = getallfrom("*","categories","","","id");
foreach($cats as $cate){
echo "<option value= '" . $cate['id'] ."'";
if($item['cat_id'] == $cate['id']) {
echo "selected";
}
echo ">" . $cate['name'] ."</option>";
}

?>  
</select>
</div>
<!-- End status -->

<!-- Start status -->
<div  class="input-group mb-3">
<span class="input-group-text">Member</span>
<select class="form-select" name="member">

<?php 
$members = getallfrom("*","users","where regstatus = 1","","userid");
foreach($members as $user){
echo "<option value= '" . $user['userid'] ."'";
if($item['member_id'] == $user['userid']){ 
echo 'selected';
}
echo ">" . $user['username'] ."</option>";
}

?>  
</select>
</div>
<!-- End status -->

<!-- Start Tags -->
<div  class="input-group mb-3">
<span class="input-group-text">Tags</span>
<input type="text" class="form-control" name="tags" value="<?php echo $item['tags'] ?>">
</div>
<!-- End Tags -->

<!--Start Button-->    
<input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Edit Item" >
<!--Start Button-->

</form>
<?php
//Start Manage Comments Page
$stmt  = $coon->prepare("SELECT comments.* ,users.username FROM comments 
INNER JOIN users ON users.userid = comments.user_id 
WHERE item_id = ? ");
$stmt->execute(array($itemid));
$rows=$stmt->fetchAll();
if(! empty($rows)){
?>
<h2 class="text-center">Item [ <?php echo  $item['iname'] ?> ] Comments</h2>
<div class="container">
<table class="table  table-dark table-hover">
<thead>
<tr>
<th scope="col">Comment  </th>
<th scope="col">User Name</th>
<th scope="col">Add Date </th>
<th scope="col">Control  </th>
</tr>
</thead>
<?php
foreach($rows as $row){
echo "<tr>";
echo "<th>" . $row['comment']  . "</th>";
echo "<th>" . $row['username'] . "</th>";
echo "<th>" . $row['c_date']   . "</th>";
echo "<th>
<a  href='comments.php?home=Edit&commentid="   . $row['c_id'] . "'class='btn btn-success'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
<path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
<path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
</svg>
Edit</a>
<a  href='comments.php?home=Delete&commentid=" . $row['c_id'] . "'class='btn btn-danger confirm'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
</svg>
Delete</a>";
if($row['activation']== 0){
echo  "<a  href='comments.php?home=Approve&commentid=" . $row['c_id'] . "'class='btn btn-secondary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2-circle' viewBox='0 0 16 16'>
<path d='M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z'/>
<path d='M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z'/>
</svg>
Approve</a>";
"</th>";
 "</tr>";
}

}

?>
<tr>
</table>
</div>
<?php
}else{
echo "<div class = 'container text-center' >";
echo "<div class= 'alert alert-success'>There Is No Comments</div>";
echo "</div>";
}

}else{
echo "<div class = 'container'>" ;
$themsg = "<div class = 'alert alert-danger'>Thres No Such ID</div>";
redirecthome($themsg);
echo "</div>";
}

}elseif($home == 'Update'){   
echo "<div class='container text-center'>";
echo "<h2 class='text-center'>Update Item</h2>";

if($_SERVER['REQUEST_METHOD'] == "POST"){

$id             = $_POST['item_id'];
$item_name      = $_POST['name']; 
$item_desc      = $_POST['desc']; 
$item_price     = $_POST['price']; 
$item_country   = $_POST['country']; 
$item_status    = $_POST['status']; 
$item_category  = $_POST['category']; 
$item_member    = $_POST['member']; 
$tags           = $_POST['tags']; 

$stmt=$coon->prepare("UPDATE items SET iname = ?, description = ?, price = ?, country = ?, status = ?, cat_id = ?, member_id = ? , tags = ?   WHERE item_id = ?  ");
$stmt->execute(array($item_name,$item_desc,$item_price,$item_country,$item_status,$item_category,$item_member, $tags ,$id));
$count = $stmt->rowCount();

// Echo Message
$themsg = "<div class= 'alert alert-success'>"   .$count .  'Save Item Update</div>';
redirecthome($themsg , 'back');

}else{
$themsg = '<div class = "alert alert-danger">Sorry You Cant Browse This Page</div>';
redirecthome($themsg);
}

echo "</div>";

}elseif($home == 'Delete'){
echo "<h2 class = 'text-center'>Delete Member</h2>";
echo "<div class = 'container text-center'>";

$itemid = (isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']): 0);

$check =checkusername('item_id', 'items',$itemid);
if(isset($check) > 0){

$stmt=$coon->prepare("DELETE FROM items WHERE item_id = ?");
// $stmt->bindparam($itemid);
$stmt->execute(array($itemid));
$themsg = "<div class= 'alert alert-success'>" . $stmt->rowCount() .  'Deleted successfully</div>';
redirecthome($themsg, 'back');
}else{
$thermsg = "<div class = 'alert alert-danger>This ID Is Not Exist</div>";
redirecthome($themsg);
}
echo "</div>"; 

}elseif($home == 'Approve'){   
echo "<h2 class = 'text-center'>Approve Item</h2>";
echo "<div class = 'container text-center'>";

$itemid = (isset($_GET['itemid']) && is_numeric($_GET['itemid']) ? intval($_GET['itemid']): 0);

$check =checkusername('item_id', 'items',$itemid);
if(isset($check) > 0){

$stmt=$coon->prepare("UPDATE items SET approve = 1 WHERE item_id = ?");
$stmt->execute(array($itemid));
$themsg = "<div class= 'alert alert-success'>" . $stmt->rowCount() .  'The Item Has Been Successfully Approve</div>';
redirecthome($themsg, 'back');
}else{
$thermsg = "<div class = 'alert alert-danger>This ID Is Not Exist</div>";
redirecthome($themsg);
}
echo "</div>"; 
}
include $tmp . 'footer.php';


}else{
header('Location:index.php');
}

ob_end_flush(); //Release The Output
