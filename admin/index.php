<?php
session_start();
$nonavbar  = '' ;
$pagetitle = 'Login';
if(isset($_SESSION['username'])){
    header('Location:dashboard.php');
}
include "init.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username    = $_POST ['user'];
    $password    = $_POST ['pass'];
    $hasheadpass =sha1($password);
    
    
    // Check If User Exist In Database
    $stmt = $coon->prepare("SELECT userid , username, password FROM users WHERE username = ? AND password = ? AND groupid = 1 LIMIT 1");
    $stmt->execute(array($username , $hasheadpass));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();
    
    // If > 0 This Mean The Database Contain Record About This username
    
    if($count > 0 ){
      $_SESSION ['username'] = $username;  //Regiser Sesstion Username
      $_SESSION ['id'] = $row['userid'];   // Regiser Sesstion ID
      header('Location:dashboard.php');
      echo 'welcome' . $_SESSION['username'];
      exit();
      
    }
}
?>

<form  class="login" action="index.php" method ="POST">
<h2    class="text-center">Admin Login</h2>
<input class= "form-control" type="text" name="user" placeholder="Username" autocomplete="off" >
<input class= "form-control" type="Password" name="pass" placeholder="Password" autocomplete="off" >
<input class="btn btn-dark d-grid gap-2 col-6 mx-auto " type="submit" value="Login" >
</form>



<?php
include $tmp  ."footer.php";
?>