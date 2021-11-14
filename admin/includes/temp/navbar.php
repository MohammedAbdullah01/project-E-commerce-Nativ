

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php"><?php echo lang('HomeAdmin')   ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#app-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="app-nav">
      <ul class="nav navbar-nav ">
        <li><a class="nav-link active" aria-current="page" href="categories.php"><?php echo lang('CATEGRIES')  ?></a></li>
        <li><a class="nav-link " aria-current="page" href="iteam.php"><?php echo lang('ITEMS')      ?></a></li>
        <li><a class="nav-link " aria-current="page" href="members.php?home=Manage"><?php echo lang('MEMBERS')    ?></a></li>
        <li><a class="nav-link " aria-current="page" href="comments.php"><?php echo lang('COMMENTS')   ?></a></li>
        <li><a class="nav-link " aria-current="page" href="#"><?php echo lang('STATISTICS') ?></a></li>
        <li><a class="nav-link " aria-current="page" href=""> <?php echo lang('LOGS')       ?></a></li>
        </ul>
        
        <ul class=" nav navbar-nav"> 
        <li class="dropdown btn btn-primary">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" >
          <?php echo  $_SESSION['username'];?>
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="members.php?home=Edit&userid=<?php echo $_SESSION['id']?>">Edit Profile</a></li>
            <li><a class="dropdown-item" href="../index.php">Visit Shop</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>






