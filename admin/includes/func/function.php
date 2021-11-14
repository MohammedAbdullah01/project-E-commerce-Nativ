<?php
function getallfrom($filed, $table, $where = NULL , $and= NULL, $orderfiled, $order = 'ASC'){
global $coon;
$stmt=$coon->prepare("SELECT $filed FROM $table $where $and ORDER BY $orderfiled $order");
$stmt->execute();
$getall=$stmt->fetchAll();
return $getall; 
}


// Title Function Thet Echo Page

function gettitle(){

    global $pagetitle;
    
      if(isset($pagetitle)){
      
      echo $pagetitle;

    }else{

      echo 'Defualt';
    }
} 
// Home Redirect function
// $themsg  = [Error , Success , Warrnig]
// $url     = [The Link To Redirect]
// $Seconds = [Seconds Before Redirect]

function redirecthome($themsg ,$url = null ,$seconds = 3){

    if($url === null){
      $url = 'index.php';
    }
    else{
      if(isset($_SERVER['HTTP_REFERER'])){
      $url = $_SERVER['HTTP_REFERER'];
    }else{
      $url = 'index.php';
    }
  }
    echo  $themsg;
    echo "<div class= 'alert alert-success text-center'> You will be redirected to the home page . $seconds </div>";
    header("refresh:$seconds ,url=$url");
    exit();
}

// function To Chek Username In Databases
function checkusername($select , $from , $value){
  global $coon;
  $stmt1=$coon->prepare("SELECT $select FROM $from WHERE $select = ?");
  $stmt1->execute(array($value));
  $count=$stmt1->rowCount();
  return $count;
}

// Function Check Count Items
function checkcount($items , $table){
global $coon;
$stmt2 =$coon->prepare("SELECT COUNT($items) FROM $table");
$stmt2 ->execute();
return $stmt2->fetchColumn();
}
// Function Latest Items ['Users', 'Items,"comments']
// $Select = The Colum In Databese
// $Table  = The Table In Databese
// $Limit        =  Number Of Record

function getlatest($select,$table, $order){
global $coon;
$stmt3 = $coon->prepare("SELECT  $select FROM $table WHERE approve = 0 ORDER BY $order DESC");
$stmt3 ->execute();
$rows = $stmt3->fetchAll();
return $rows;

}
function getlatestuser($select,$table, $order){
  global $coon;
  $stmt4 = $coon->prepare("SELECT  $select FROM $table WHERE regstatus = 0 ORDER BY $order DESC");
  $stmt4 ->execute();
  $roows = $stmt4->fetchAll();
  return $roows;
  
  }
