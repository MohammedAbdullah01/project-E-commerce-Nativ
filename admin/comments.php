<?php
session_start();

$pagetitle = 'Comments'; //Titel Name Page

if(isset($_SESSION['username'])){
include 'init.php';

$home = isset($_GET['home']) ? $_GET['home'] :'Manage';

//Start Manage Comments Page
if($home == 'Manage'){

$stmt  = $coon->prepare("SELECT comments.*, items.iname ,users.username   FROM comments 
INNER JOIN items  ON items.item_id = comments.item_id 
INNER JOIN users ON users.userid = comments.user_id ORDER BY c_id DESC ");
$stmt->execute();
$rows=$stmt->fetchAll();
?>
<h2 class="text-center">Manage Comments</h2>
<?php
if(! empty($rows)){
?> 
<div class="container">
<table class="table  table-dark table-hover">
<thead>
<tr>
<th scope="col">ID</th>
<th scope="col">comment</th>
<th scope="col">Item Name</th>
<th scope="col">User Name</th>
<th scope="col">Add Date</th>
<th scope="col">Control</th>
</tr>
</thead>
<?php
foreach($rows as $row){
echo "<tr>";
echo "<th>" . $row['c_id']     . "</th>";
echo "<th>" . $row['comment']  . "</th>";
echo "<th>" . $row['iname']     . "</th>";
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
if($row['activation'] == 0){
echo  "<a  href='comments.php?home=Approve&commentid=" . $row['c_id'] . "'class='btn btn-secondary'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2-circle' viewBox='0 0 16 16'>
<path d='M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z'/>
<path d='M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z'/>
</svg>
Approve</a>";
}
"</th>";
echo "</tr>";
}

?>
<tr>
</table>
<?php
}else{
echo "<div class = 'container text-center' >";
echo "<div class= 'alert alert-success'>There Is No Comments</div>";
echo "</div>";
}

}elseif($home == 'Edit'){
// Check If Request User Id is IT Numeric
$commentid = isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']): 0;
echo  "<div  class='container text-center'>";
echo  "<h2   class = 'text-center'>Edit Comments</h2>";
// Select All Data Is Comments 
$stmt  =$coon->prepare("SELECT * FROM comments WHERE c_id = ?");
$stmt ->execute(array($commentid));
$row   = $stmt->fetch();
$count = $stmt->rowCount();

if($count > 0){?>
<form class="edit-user" action="?home=Update" method="post">
<input type="hidden" name="commentid" value="<?php echo $commentid ?>" >
<div  class="input-group mb-3">
<span class="input-group-text">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
<path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
</svg>
</span>
<span class="input-group-text">Comment</span>
<textarea class="form-control" name="Comment"><?php echo $row['comment'] ?></textarea>
</div>
<input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Save" >
</form>

<?php
}else{
echo "<div class = 'container'>" ;
$themsg = "<div class = 'alert alert-danger'>Thres No Such ID</div>";
redirecthome($themsg ,'back');
echo "</div>";
}
echo "</div>";
}elseif($home == 'Update'){

echo "<div class = 'container text-center'>";
echo "<h2 class = 'text-center'>Update Comments</h2>";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$id       = $_POST['commentid'];
$comment  = $_POST['Comment'];

$formerror =array();
if(strlen( $comment ) < 4){
$formerror[] ='Comment Cant Be Less The 4 Characters ';
}
if(empty( $comment )){
$formerror[] ='Comment Cant Be Empty ';
}
// LOOP INTO Array
foreach($formerror as $erro){
echo  "<div class= 'alert alert-danger'>" .$erro .'</div>' ; 
}
if(empty($formerror)){
// Update The Database
$stmt = $coon->prepare("UPDATE comments SET comment = ?  WHERE c_id = ? ");
$stmt->execute(array($comment,$id));
// Echo Message
$themsg = "<div class= 'alert alert-success'>"   .$stmt->rowCount() .  'Save Comments Update</div>';
redirecthome($themsg , 'back');
}

}else{
$themsg = '<div class = "alert alert-danger">Sorry You Cant Browse This Page</div>';
redirecthome($themsg);
}
echo '</div>';

}elseif($home == 'Delete'){
echo "<h2 class = 'text-center'>Delete Comments</h2>";
echo "<div class = 'container text-center'>";

$commentid = (isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']): 0);

$check =checkusername('c_id', 'comments',$commentid);
if(isset($check) > 0){

$stmt=$coon->prepare("DELETE FROM comments WHERE c_id = :zcoment");
$stmt->bindparam(":zcoment" ,$commentid);
$stmt->execute();
$themsg = "<div class= 'alert alert-success'>" . $stmt->rowCount() .  'Deleted successfully</div>';
redirecthome($themsg, 'back');
}else{
$thermsg = "<div class = 'alert alert-danger>This ID Is Not Exist</div>";
redirecthome($themsg);
}
echo "</div>"; 

}elseif($home == 'Approve'){
echo "<h2 class = 'text-center'>Approve Comments</h2>";
echo "<div class = 'container text-center'>";

$commentid = (isset($_GET['commentid']) && is_numeric($_GET['commentid']) ? intval($_GET['commentid']): 0);

$check =checkusername('c_id', 'comments',$commentid);
if(isset($check) > 0){

$stmt=$coon->prepare("UPDATE comments SET activation = 1  WHERE c_id = ?");
$stmt->execute(array($commentid));
$themsg = "<div class= 'alert alert-success'>" . $stmt->rowCount() .  'The Comments Has Been Successfully Approve</div>';
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
exit();
}
