<?php
session_start(); 
$pagetitle= 'Home page';
include 'init.php';?>

<!-- Start Section carousel  -->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/index/index9.jpg" class="d-block w-100"  alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/index/index8.jpg" class="d-block w-100"  alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/index/index5.jpg" class="d-block w-100"  alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- End Section carousel  -->

 <!-- Start Section About Welcome  -->
<section class="about text-center">
    <div class="container">
      <h1>Welcome To The <span>Meta</span> Site</h1>
        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi maiores tempora quis molestias voluptate deserunt saepe fugit nam, aliquam vel, nobis odio recusandae amet corrupti consequatur eum, <strong>doloremque</strong>   temporibus deleniti. </p>
    </div>
  </section>
  <!-- End Section About Welcome  -->

 <!-- Start Section TOP Rated Items  -->
 
<div class="container">
<h2 class= "text-center">TOP Rated Items</h2>
  <div class="row">
   
<?php
$getitems= getall('*', 'items','where approve = 1','And rating >= 5','item_id');
foreach($getitems as $item){
?>
  <div class=" col-lg-3 col-md-6 col-sm-6 ">
    <div class="card">
      <span class="price">$<?php echo $item['price'];?></span>
      <img src="admin/upload/avatar_item/<?php echo $item['uplo_avatar']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $item['iname'] ?></h5>
          <p class="card-text"><?php echo $item['description'] ;?></p>
          <div class="date"><?php echo $item['add_date'];?></div>
          <a href="items.php?itemid=<?php echo $item['item_id'];?>" class="btn btn-primary">More </a>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg>
        
      </div>
    </div>
  </div>


<?php
}
?>
</div>
</div>
<!-- End Section TOP Rated Items  -->

<!--start section price table -->
                                  
<section class="pricee text-center ">
      <div class="container">
        <h1>Ouar Amazing Price</h1>
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="price_Box">
              <h3 class="text-primary">IPhone</h3>
              <p class="center"> $200 </p>
              <ul class="list-unstyled">
                <li>iphone 7</li>
               
              </ul>
              <a href="#" class="btn btn-primary">Order Now</a>
            </div>
          </div>
          
          <div class="col-lg-3 col-sm-6">
            <div class="price_Box">
              <h3 class="text-success"> Samsung </h3>
              <p class="center"> $150 </p>
              <ul class="list-unstyled">
                <li>Galaxy 7</li>
                
              </ul>
              <a href="#" class="btn btn-success">Order Now</a>
            </div>
          </div>
          
          <div class="col-lg-3 col-sm-6">
            <div class="price_Box">
              <h3 class="text-info">Huawei </h3>
              <p class="center"> $100 </p>
              <ul class="list-unstyled">
                <li>Nova 7</li>
              
              </ul>
              <a href="#" class="btn btn-info">Order Now</a>
            </div>
          </div>
          
          <div class="col-lg-3 col-sm-6">
            <div class="price_Box">
              <h3 class="text-danger">Oppo </h3>
              <p class="center"> $75 </p>
              <ul class="list-unstyled">
                <li> Reno 7</li>
              
              </ul>
              <a href="#" class="btn btn-danger">Order Now</a>
            </div>
          </div>
        </div>
      </div>
</section>
<!--End section price table -->

<!-- Start Section All Items  -->
 
<div class="container">
<h2 class= "text-center">New Items</h2>
  <div class="row">
   
<?php
$getitems= getall('*', 'items','where approve = 1','And rating < 5','item_id','DESC' ,'limit 8');
foreach($getitems as $item){
?>
  <div class=" col-lg-3 col-md-6 col-sm-6 ">
    <div class="card">
      <span class="price">$<?php echo $item['price'];?></span>
      <img src="admin/upload/avatar_item/<?php echo $item['uplo_avatar']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $item['iname'] ?></h5>
          <p class="card-text"><?php echo $item['description'] ;?></p>
          <div class="date"><?php echo $item['add_date'];?></div>
          <a href="items.php?itemid=<?php echo $item['item_id'];?>" class="btn btn-primary">More </a>
          <?php
          if($item['rating'] <=2){?>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          
          <?php
          }elseif($item['rating'] == 3 ){?>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <?php
          }elseif($item['rating'] == 4){?>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
          </svg>
          <?php
          }
          ?>
      </div>
    </div>
  </div>


<?php
}
?>
</div>
</div>
<!-- End Section ALL Items  -->

<!--Start section stiats -->
                              
<section class="stets text-center">
  <div class="data">
    <div class="container">
      <h1>Our Main stets </h1>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="steet"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
              <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
            </svg>
            <p><?php echo checkcount('userid','users') ?></p>
            <Span>Users In Number</Span>

          </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="steet"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                  </svg>
                    <p><?php echo checkcount('c_id','comments') ?></p>
                      <Span>The Number Of Commons</Span>
                      
              
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="steet"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                  </svg>
                    <p><?php echo checkcount('item_id','items') ?></p>
                      <span>Number Of Projects</span>
              
            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="steet"> 
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
                  </svg>
                    <p>9,405</p>
                      <span>Technical Support Tickets</span>
            </div>
          </div>
        
      </div>
    </div>
  </div>
</section>
<!--End section stiats -->

<!--start testimonials secation -->
  
<section class="testimonials text-center">
  <div class="container">
    <h1>What Our Clinets Say</h1>
    <div id="carousel_testimonials" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem quod velit perspiciatis quisquam molestias dolores soluta harum. Blanditiis nesciunt laborum nam quaerat velit omnis, alias non eos soluta asperiores.</p>
                <span>Mohamed Abdallah</span>
                  </div>
          
          <div class="carousel-item">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem quod velit perspiciatis quisquam molestias dolores soluta harum. Blanditiis nesciunt laborum nam quaerat velit omnis, alias non eos soluta asperiores.</p>
                <span>Ahmed Mostafa</span>
                  </div>
          
          <div class="carousel-item">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem quod velit perspiciatis quisquam molestias dolores soluta harum. Blanditiis nesciunt laborum nam quaerat velit omnis, alias non eos soluta asperiores.</p>
                <span>Karma Mohamed</span>
                  </div>
          
          <div class="carousel-item">
              <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam rem quod velit perspiciatis quisquam molestias dolores soluta harum. Blanditiis nesciunt laborum nam quaerat velit omnis, alias non eos soluta asperiores.</p>
                <span>Mohamed Yahiya</span>
                  </div>
          
        </div>
        
        <ol class="carousel-indicators">
          <li data-bs-target="#carousel_testimonials" data-bs-slide-to="0" class="active">
            <img src="img/index/vactormm.png" alt="Mohamed">
              </li>
          
          <li  data-bs-target="#carousel_testimonials" data-bs-slide-to="1">
            <img src="img/index/vactorn.jpg" alt="Ahmed">
              </li>
          
          <li  data-bs-target="#carousel_testimonials" data-bs-slide-to="2">
            <img src="img/index/vactor3.png" alt="Karma">
              </li>
          
          <li  data-bs-target="#carousel_testimonials" data-bs-slide-to="3">
            <img src="img/index/vactorm.jpg" alt="Mohamed">
              </li>
        
      </ol>
    </div>
  </div>
</section>

<!--End testimonials secation -->


<!--start section Coantact Us-->
                                
<section class="contact-us text-center">
  <div class="fields">
    <div class="container">
      <h1>Tall Us What YOu Fill</h1>
        <p class="lead">Fell Free To Contact Us Anytime</p>
        <div class="row">
          <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <span class="input-group-text ico" id="basic-addon2"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </svg></span>
    </div>
    <div class="input-group mb-3 ">
      <input type="text" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
      <span class="input-group-text ico" id="basic-addon2"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
      </svg></span>
</div>
<div class="input-group mb-3 ">
  <input type="text" class="form-control" placeholder="Cell Phone" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text ico" id="basic-addon2"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
  </svg> </span>
</div>
</div>
<div class="col-md-6">
<div class="input-group mb-3 ">
  <textarea class="form-control textarea" placeholder="Your Message" style="height: 130px"></textarea>
</div>
<div class="d-grid gap-2 ">
  <button type="button" class="btn btn-danger btn-lg">Contact Us</button>
</div>
</div>
  </div>
</div>
</section>
<!--End section Coantact Us-->


<!--Start section Subscribe -->
                              

<section class="Subscribe text-center">
    <div class="container">
      <h1>Keep In Toush</h1>
        <p class="lead"> Sign Up For NewsLeater Doant Worry Spam We Hate It Too</p>
          <div class="form-inline">
            <input class="form-control sub" type="text" placeholder="Write Your Email">
              <button class="btn btn-danger">Subscribe</button>
            </div>
      </div>
  </section>

<!--End section Subscribe -->

<?php
include $tmp  ."footer.php";
?>