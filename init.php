<?php

include "admin/coon.php";

$session_user="";

if(isset($_SESSION['user'])){
    $session_user = $_SESSION['user'];
  
}


// ROUTES PASS

$tmp  =   'includes/temp/';  //Template  Directory
$lang =   'includes/lang/';  //languages  Directory
$func =   'includes/func/';  //Functions  Directory
$css  =   'layout/css/';     //css  Directory
$js   =   'layout/js/';      //js  Directory

include $func . 'function.php';
include $lang . 'eng.php';
include $tmp  . 'header.php';

?> 