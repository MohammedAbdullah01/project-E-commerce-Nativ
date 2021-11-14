<?php
session_start();
$pagetitle = 'Add items';
include 'init.php';
if (isset($_SESSION['user'])) {

      if ($_SERVER['REQUEST_METHOD'] == "POST"){

      $formerror = array();
      // Upload Variables
$avatarname  = $_FILES['avatar']['name'];
$avatarsize  = $_FILES['avatar']['size'];
$avatartemp  = $_FILES['avatar']['tmp_name'];
$avatartype  = $_FILES['avatar']['type'];

// List Of Allowed File Typed To Upload
$avatarallowedex = array("jpeg","jpg","png","gif");
$avatarex = explode(".", $avatarname );
$srt_s = strtolower(end($avatarex));

      $name         = filter_var($_POST['name'],     FILTER_SANITIZE_STRING);
      $desc         = filter_var($_POST['desc'],     FILTER_SANITIZE_STRING);
      $price        = filter_var($_POST['price'],    FILTER_SANITIZE_NUMBER_INT);
      $country      = filter_var($_POST['country'],  FILTER_SANITIZE_STRING);
      $status       = filter_var($_POST['status'],   FILTER_SANITIZE_NUMBER_INT);
      $category     = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
      $tags         = filter_var($_POST['tags'],     FILTER_SANITIZE_STRING);

    if($avatarsize > 4194304){
    $formerror[] ='Avatar Cant Be Larger Than 4MB';
    }
    if(!empty($avatarname)&&!in_array($srt_s,$avatarallowedex)){
    $formerror[] ='This Extension Is Not Allowed';
    }
    if(empty($avatarname ) ){
      $formerror[] ='Avatar Is Required';
      }
      if (strlen($name) < 4) {
      $formerror[] = "Item Tittel Cannot Be Less The 4 Characters";
      }
      if (empty($name)) {
      $formerror[] = "Item Tittel Cannot Be Empty";
      }
      if (strlen($desc) < 5) {
      $formerror[] = "Item Description Cannot Be Less The 4 Characters";
      }
      if (empty($desc)) {
      $formerror[] = "Item Description Cannot Be Empty";
      }
      if (empty($price)) {
      $formerror[] = "Item Price Cannot Be Empty";
      }
      if (strlen($country) < 2) {
      $formerror[] = "Item Country Mest Be At Least 2 Charcters";
      }
      if (empty($country)) {
      $formerror[] = "Item Price Cannot Be Empty";
      }
      if (empty($status)) {
      $formerror[] = "Item Price Cannot Be Empty";
      }
      if (empty($category)) {
      $formerror[] = "Item Price Cannot Be Empty";
      }
      if (strlen($tags) > 30) {
      $formerror[] = "Item Tags Cannot Be Less The 30 Characters";
      }
      if(empty($formerror)){
        $avatar= rand(0, 10000000000) .'_'. $avatarname;
        move_uploaded_file($avatartemp ,"admin/upload\avatar_item\\". $avatar );

      $stmt = $coon->prepare("INSERT INTO items(iname , description , price, add_date ,country, status, cat_id ,member_id ,tags  ,uplo_avatar)
      values(:zname , :zdesc , :zprice , now(), :zcountry , :zstatus ,:zcat, :zmember, :ztags , :zimage)");
      $stmt->execute(array(
      'zname'    =>  $name,
      'zdesc'    =>  $desc,
      'zprice'   =>  $price,
      'zcountry' =>  $country,
      'zstatus'  =>  $status,
      'zcat'     =>  $category,
      'ztags'    =>  $tags,
      'zimage'   =>  $avatar,
      'zmember'  =>  $_SESSION['uid']
      ));
      if ($stmt) {
      ?>
      <script>
        window.location.href="profile.php";
      </script>
      <?php
      
      }
      }
    }
      ?>
      <div class="states">
      <div class="container">
      <h2 class="text-center">New Item</h2>
      <div class="row">
      <div class=" col-md-3">
      <div class="card live-card">
      <span class="price">$Price</span>
        <img src="admin/upload/avatar_item/product-default.png" class="card-img-top" alt="...">
      <div class="card-body">
      <h3 class="card-title">Name Item</h3>
      <p class="card-text">Description</p>
      </div>
      </div>
      </div>
      <div class=" col-md-6">
      <form class="Add-cat" action="newads.php" method="post" enctype="multipart/form-data">

      <div class="input-group mb-3">
      <span class="input-group-text">Img</span>
      <input type="file" class="form-control" name="avatar">
      </div>
      <!-- Start Name -->
      <div class="input-group mb-3">
      <span class="input-group-text">Name</span>
      <input type="text" class="form-control live-name" name="name" placeholder="Name Of The Item" required>
      </div>
      <!-- End Name -->

      <!-- Start Description -->
      <div class="input-group mb-3">
      <span class="input-group-text">Description</span>
      <input type="text" class="form-control live-desc" name="desc" placeholder="About The Product" required>
      </div>
      <!-- End Description -->

      <!-- Start price -->
      <div class="input-group mb-3">
      <span class="input-group-text">price</span>
      <input type="text" class="form-control live-price" name="price" placeholder="The Item Price Must Contain A Number" required>
      </div>
      <!-- End price -->

      <!-- Start Country -->
      <div class="input-group mb-3">
      <span class="input-group-text">Country</span>
      <input type="text" class="form-control" name="country" placeholder="Country Of The Item" required>
      </div>
      <!-- End Country -->

      <!-- Start status -->
      <div class="input-group mb-3">
      <span class="input-group-text">Status</span>
      <select class="form-select" name="status" required>
      <option selected value="">Choose...</option>
      <option value="1">New</option>
      <option value="2">Used</option>
      </select>
      </div>
      <!-- End status -->

      <!-- Start Category -->
      <div class="input-group mb-3">
      <span class="input-group-text">Category</span>
      <select class="form-select" name="category" required>
      <option selected value="">Choose...</option>

      <?php
      $get_category = getall('*' ,'categories','where parent = 0','','id');
      foreach ($get_category as $cate) {?>
      <option value= '<?php echo $cate['id']?> '><?php echo $cate['name']?> 
    </option>
      <?php
      $get_c = getall("*" ,"categories","where parent = {$cate['id']}",'','id');
      foreach($get_c as $c){?>
      <option class="s_cat"  value= '<?php echo $c['id']?> '><?php echo "  ". "  ".$c['name']  ?> </option>
      
<?php
  }
}

      ?>
      </select>
      </div>
      <!-- End Category -->

        <!-- Start Tags -->
        <div class="input-group mb-3">
      <span class="input-group-text">Tags</span>
      <input type="text" class="form-control" name="tags" placeholder="Country Of The Item" required>
      </div>
      <!-- End Tags -->

      <!--Start Button-->
      <input type="submit" class="btn btn-dark d-grid gap-2 col-6 mx-auto " value="Add Item">
      <!--Start Button-->

      </form>
      </div>

      </div>
      <?php
      if (!empty($formerror)) {
      foreach ($formerror as $error) {
      echo "<div class = 'text-center alert alert-danger'>" . $error . "</div>";
      }
      }
      if(isset($succesmsg)){
        echo "<div class= 'alert alert-success text-center'>" . $succesmsg . "</div>";
      }
      ?>
      </div>
      </div>


      <?php

      }else {
      header('Location:login.php');
      exit();
      }
      include $tmp  . "footer.php";

      ?>