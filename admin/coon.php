<?php

$dsn = "mysql:host=localhost;dbname=shop";
$user   = "root";
$pass   = "";
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try{
    $coon = new PDO($dsn, $user, $pass, $option);
    $coon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo 'good connaction';
}
catch(PDOException $e){
    echo 'bad connaction' . $e->getMessage();
}


