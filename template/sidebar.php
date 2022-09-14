<div class="col-12 col-lg-3 col-xl-2 vh-100 ">
                <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
                    <div class="d-flex justify-content-center align-items-center ">
                        <span class="mr-2 bg-primary text-light d-flex justify-content-center align-items-center p-2 rounded"><i class="feather-shopping-bag"></i></span>
                        <span class="font-weight-bolder text-primary text-uppercase h6 mb-0">FTWhisperers</span>
                    </div>
                    <button class="hide-sidebar-btn btn btn-light text-primary d-lg-none d-block" style="font-size: 2rem;"><i class="feather-x"></i></button>
                </div>
                <div class="nav-menu">
                    <ul>
                    <li class="menu-item">
                           <a href="<?php echo $url ?>dashboard.php" class="menu-item-link">
                            <span>
                                <i class=" feather-home"></i>
                                Dash Board 
                            </span>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="<?php echo $url ?>index.php" class="menu-item-link">
                            <span>
                                <i class=" feather-arrow-up-left"></i>
                                Go News
                            </span>
                           </a>
                        </li>
                         <li class="menu-item">
                           <a href="<?php echo $url ?>transition.php" class="menu-item-link">
                            <span>
                                <i class=" feather-dollar-sign"></i>
                                Wallet
                            </span>
                           </a>
                        </li>
                        <li class="menu-space"></li>
<li class="menu-title">
    <span>Manage Posts</span>
</li>
<li class="menu-item">
   <a href="<?php echo $url ?>post_add.php" class="menu-item-link ပ">
    <span>
        <i class=" feather-plus-circle"></i>
        Add Post
    </span>
   </a>
</li>
<li class="menu-item">
    <a href="<?php echo $url ?>post_list.php" class="menu-item-link">
     <span>
         <i class=" feather-list"></i>
         Post List
     </span>
     <span class="badge badge-pill shadow-sm bg-white text-primary p-1">
     <?php echo countTotal('post') ?>
     </span>
    </a>
 </li>
 <li class="menu-space">

 <?php if($_SESSION['user']['role']==0){ ?>
    <li class="menu-title">
    <span>Manage Ads</span>
</li>
<li class="menu-item">
   <a href="<?php echo $url ?>ads_section_zero.php" class="menu-item-link ပ">
    <span>
        <i class=" feather-anchor"></i>
        Add Ads
    </span>
   </a>
</li>
<li class="menu-item">
   <a href="<?php echo $url ?>ads_list.php" class="menu-item-link ပ">
    <span>
        <i class=" feather-list"></i>
        Ads List
    </span>
   </a>
</li>
 <?php } ?>

    <?php if($_SESSION['user']['role']<=1){ ?>

    
<li class="menu-title">
    <span>Setting</span>
</li>
<li class="menu-item">
   <a href="<?php echo $url ?>category_add.php" class="btn menu-item-link w-100">
        <i class="feather-layers"></i>
        Category-Manager
        <span class="badge badge-pill shadow-sm bg-white text-primary p-1">
     <?php echo countTotal('category') ?>
     </span>
   </a>
   <?php if($_SESSION['user']['role']==0){ ?>
   <li class="menu-item">
   <a href="<?php echo $url ?>user_list.php" class="btn menu-item-link w-100">
        <i class="feather-users"></i>
        Manage User
        <span class="badge badge-pill shadow-sm bg-white text-primary p-1">
     <?php echo countTotal('users') ?>
     </span>
   </a>
  <?php }?>
</li>
<?php }?>
<li class="menu-space">
<li class="menu-item">
   <a href="<?php echo $url ?>logout.php" class="btn btn-secondary w-100">
        <i class=" feather-lock"></i>
        Log-out
   </a>
</li>
</li>
                    </ul>
                </div>
            </div>