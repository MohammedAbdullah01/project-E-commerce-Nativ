<?php

include 'coon.php';

// ROUTES PASS

$tmp  =   'includes/temp/';  //Template  Directory
$lang =   'includes/lang/';  //languages  Directory
$func =   'includes/func/';  //Functions  Directory
$css  =   'layout/css/';     //css  Directory
$js   =   'layout/js/';      //js  Directory

include $func . 'function.php';
include $lang . 'eng.php';
include $tmp  . 'header.php';


if(!isset($nonavbar)) {include $tmp  . 'navbar.php';}




?> 