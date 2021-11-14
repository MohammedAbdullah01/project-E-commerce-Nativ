<?php

//===================
//===Category Page===
//===================

ob_start(); //Output Buferring Start
session_start();
$pagetitle='Categories';
// Creat The Page[Manage | Edit |Update |Add | Delete | Insert |Stats]

if(isset($_SESSION['username'])){

    include 'init.php';

 
$home= isset($_GET['home']) ? $_GET['home']: 'Manage';

if($home  == 'Manage'){
  
 
}elseif($home == 'Add'){

    
}elseif($home == 'Insert'){   
  echo 'Welcome are You In Edit';

}elseif($home == 'Edit'){   
  echo 'Welcome are You In Edit';

}elseif($home == 'Update'){   
  echo 'Welcome are You In Edit';

}elseif($home == 'Delete'){   
  echo 'Welcome are You In Edit';

}elseif($home == 'Activate'){   
  echo 'Welcome are You In Edit';
}

include $tmp . 'footer.php';

}else{
  header('Location:index.php');
}
ob_end_flush(); //Release The Output
?>