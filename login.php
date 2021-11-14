<?php
session_start(); 
$pagetitle= 'Login';
if(isset($_SESSION['user'])){
    // header('Location:index.php');
}
include 'init.php';

if($_SERVER['REQUEST_METHOD']== "POST"){
  if(isset($_POST['login'])){

    $user     = $_POST["username"];
    $pass     = $_POST["password"];
    $hashdpass= sha1($pass);
    $stmt=$coon->prepare("SELECT userid , username , password FROM users WHERE username = ? AND password = ?");
    $stmt->execute(array($user, $hashdpass));
    $count=$stmt->rowCount();
    $get = $stmt->fetch();
    if($count > 0){
        $_SESSION['user'] = $user;
        $_SESSION['uid'] = $get['userid'];?>
     <script>
        window.location.href="index.php";
      </script>
      exit();
      <?php
    }else{
      echo "<div class = 'alert alert-danger text-center'>Wrong username or password, check again</div>";
    }
  }else{
      $formerror= array();
      $username  = $_POST['user'];
      $password  = $_POST['pass'];
      $email = $_POST['email'];
      if(isset($user)){
      $filter_user = filter_var($username , FILTER_SANITIZE_STRING);
      if(strlen($filter_user) < 4){
        $formerror[]="The Name Must Be Greater Than <strong> 4 </strong> Letters";
      }
      if(empty($filter_user)){
        $formerror[] = "The field <strong> Username </strong> cannot be empty ";
      }
      }
      if(isset($password)){
        if(empty($password)){
          $formerror [] = "The field <strong> Password </strong> cannot be  empty ";
        }
        $hpassword  = sha1($password);
      }
      if(isset($email)){
      $filter_email = filter_var($email, FILTER_SANITIZE_EMAIL);
      if(filter_var($email , FILTER_VALIDATE_EMAIL) !=true){

        $formerror[] = "The <strong> Email </strong> Is Not Valid";
      }
    }
    if(empty($formerror)){
      $stmt= $coon->prepare("SELECT username FROM users WHERE username = ?");
      $stmt->execute(array($username));
      $count = $stmt->rowCount();
      if($count == 1){
        $formerror [] = "<strong> Username </strong> exists";

      }else{
        $userstmt=$coon->prepare("INSERT INTO users(username , password , email , regstatus , date)
                                  values(:zuser , :zpass , :zmail , 0, now())");
        $userstmt->execute(array(
          'zuser' => $username,
          'zpass' => sha1($password),
          'zmail' => $email
        ));
        $succesmsg = "You are Now A Registered Member";
      }
    }
      
    }
}

?>
<div class="container login-page">
<section class="about text-center">
<img src="img/logo_meta (2).png" width="400px" height="300px" alt="" >
</section>
<h2  class="text-center">
<span class="selected" data-class="login">Login</span> |
<span data-class="Signup">Signup</span>
</h2>

<form  class="login" action="login.php" method ="POST">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
<input class= "form-control" type="text" name="username" placeholder="Username"  autocomplete="off" >

<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>
<input class= "form-control" type="Password" name="password" placeholder="Password"   autocomplete="new-password" >
<input class="btn btn-primary d-grid gap-2 col-12 mx-auto " type="submit" name="login" value="Login" >
</form>


<form  class="Signup" action="login.php" method ="POST">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
<input pattern="{4,}" title="Username Must Be Between 4 chars" class= "form-control" type="text" name="user" 
required  placeholder=" Username"  autocomplete="off" >


<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>
<input minlength="4" class= "form-control password" type="Password" name="pass" 
required  placeholder="Type a Strong Password"  autocomplete="new-password" >

<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
<input class= "form-control" type="email" name="email" required placeholder="Type a Valid Email"  >

<input class="btn btn-success d-grid gap-2 col-12 mx-auto" type="submit" name="signup" value="Signup" >
</form>
<div class="error_signup text-center">
  <?php
  if(! empty($formerror)){
  foreach($formerror as $error){
    echo "<div class = 'alert alert-danger'>" . $error. "</div>";
  }
}
if(isset($succesmsg)){
  echo "<div class = 'alert alert-success'>" . $succesmsg. "</div>";

}
  
  ?>
</div>
</div>


<?php
include $tmp.'footer.php';
?>