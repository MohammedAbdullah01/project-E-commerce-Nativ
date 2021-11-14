<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<link rel="stylesheet" href="layout/css/bootstrap.min.css">
<link rel="stylesheet" href="layout/css/frontend.css">
<title><?php gettitle(); ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
<a class="btn btn-secondary" href="index.php"> <?php echo lang('HomeAdmin')   ?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="app-nav">
<ul class="nav navbar-nav nav justify-content-center ">
<?php
$c_cate = getall("*","categories","where parent = 0","","id","ASC" );
foreach($c_cate as $c_g){?>
<div class="btn-group">
<a class="btn btn-secondary" href ="categories.php?page=<?php echo $c_g['id'] ?>"> <?php echo $c_g['name']?></a>
<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>
<ul class="dropdown-menu">
<?php
$c_parent = getall("*","categories","where parent = {$c_g['id']}","","id","ASC" );
foreach($c_parent as $c_p){?>
<li><a class="dropdown-item d-parent" href="all items.php?page=<?php echo $c_p['id'] ?>"><?php echo $c_p['name'] ?></a></li>
<?php
}
?>
</ul>
</div>
<?php
}
?>


</ul>
<?php


if(isset($_SESSION['uid'])){
  $stmt= $coon->prepare("SELECT * FROM users WHERE userid = ?");
  $stmt->execute(array($_SESSION['uid']));
  $user_im=$stmt->fetch();
  $count =$stmt->rowCount();
 
?>

<ul class=" nav navbar-nav">
  <?php
  if($count > 0){
  if(!empty($user_im['u_img'])){
  ?>
<img src="admin/upload/avatar/<?php echo $user_im['u_img'];?>" alt="">
<?php
}else{?>
  <img src="admin/upload/avatar/Defualte.jpg" alt="">
  <?php
}
?>
<div class="btn-group">
<a class="btn btn-secondary"  href="profile.php" ><?php echo $_SESSION['user']; ?>

</a>
<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false"></button>

<ul class="dropdown-menu">

<li><a class="dropdown-item" href="newads.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags" viewBox="0 0 16 16">
  <path d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
  <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
</svg> New Item</a></li>

<li><a class="dropdown-item" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Logout </a></li>
</ul>
</div>

<?php
}else{?>
  <ul class=" nav navbar-nav">
  <li class="nav-item">
  <a class="nav-link"  href="login.php">Login | Signup
  </a> 
  </li>
  </ul> 
  <?php
  }
}else{?>
  <ul class=" nav navbar-nav">
  <li class="nav-item">
  <a class="nav-link"  href="login.php">Login | Signup
  </a> 
  </li>
  </ul> 
  <?php
}
?>

</ul>
</div>
</div>
</nav>
