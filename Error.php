<?php
$pagetittle= "ERROR";
$nonavbar="";
if(isset($_SESSION['user'])){
include "init.php";
?>
<div class=" error">
    <img class="img-fluid" src="404-error-vector-error-404-1852723.jpg"  alt="">
    <h2>There Are No Results With These Values : Go To Page Home-<a href="dashboard.php">Page</a> </h2>
</div>
<?php
}else{
  header("Location:logout.php");
  exit();
}
include $tmp  . "footer.php";
