<?php

function getall($field, $table , $where = NULL , $and = NULL , $orderfield , $order = NULL , $limit = NULL){
 
  global $coon;
  $all = $coon->prepare("SELECT $field FROM $table $where $and  ORDER BY $orderfield $order $limit");
  $all->execute();
  $allfrom = $all->fetchAll();
  return $allfrom;
  
  }

function getcate($select ,$table ,$where= Null){
  global $coon;
  $cates = $coon->prepare("SELECT $select FROM $table  $where ");
  $cates->execute();
  $categ = $cates->fetch();
  return $categ;
  
  }

  function getitem($where, $value, $approve = Null){
    if($approve == NUll ){
      $sql = 'AND approve = 1';
    }else{
      $sql = NULL;
    }
    global $coon;
    $item = $coon->prepare("SELECT * FROM items WHERE $where = ? $sql  ORDER BY item_id DESC");
    $item->execute(array($value));
    $items = $item->fetchAll();
    return $items;
    
    }
    // function To Chek Username In Databases
function checkusername($select , $from , $value){
  global $coon;
  $stmt1=$coon->prepare("SELECT $select FROM $from WHERE $select = ?");
  $stmt1->execute(array($value));
  $count=$stmt1->rowCount();
  return $count;
}
// Function Check Count Column
function checkcount($column , $table){
  global $coon;
  $stmt2 =$coon->prepare("SELECT COUNT($column) FROM $table");
  $stmt2 ->execute();
  return $stmt2->fetchColumn();
  }


    function checkuserstatues($user){
      global $$coon;
      $stmts=$coon ->prepare("SELECT username , regstatus FROM users WHERE username = ? AND regstatus = 0");
      $stmts->execute($user);
      $status=$stmts->rowCount();
      return $status;
    }

    // Home Redirect function
// $themsg  = [Error , Success , Warrnig]
// $url     = [The Link To Redirect]
// $Seconds = [Seconds Before Redirect]

function redirecthome($themsg ,$url = null ,$seconds = 3){

  if($url === null){
    $url = 'logout.php';
  }
  else{
    if(isset($_SERVER['HTTP_REFERER'])){
    $url = $_SERVER['HTTP_REFERER'];
  }else{
    $url = 'logout.php';
  }
}
  echo  $themsg;
  echo "<div class= 'alert alert-success text-center'> You will be redirected to the home page . $seconds </div>";
  header("refresh:$seconds ,url=$url");
  exit();
}
  

/*==================================
        Start Back End
==================================*/
// Title Function Thet Echo Page

function gettitle(){

    global $pagetitle;
    
      if(isset($pagetitle)){
      
      echo $pagetitle;

    }else{

      echo 'Defualt';
    }
} 






