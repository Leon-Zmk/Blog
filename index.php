<?php session_start() ?>
<?php require_once("front_panel/head.php") ?>
<title>Home</title>
<?php require_once("front_panel/side_head.php") ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>index.php"><i class="feather-home ml-1"></i> Home</a></li>
                            </ol>
                          </nav>
                
                <div class="">

                <div class="dropdown my-4 text-right">
  <button class="btn btn-primary dropdown-toggle feather-calendar" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sort Posts
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="?column=create_at&order=desc">
     <i class='feather-arrow-down-circle'></i> Newest To Oldest
    </a>
    <a class="dropdown-item" href="?column=create_at&order=asc">
     <i class='feather-arrow-up-circle'></i> Oldest To Newest
    </a>
    <a class="dropdown-item" href="?column=id&order=desc">
     <i class='feather-list'></i>Default
    </a>
  </div>
</div>
  
             <?php 
            
             if(isset($_GET['column'])& isset($_GET['order'])){
               $col=$_GET['column'];
               $type=$_GET['order'];
                $fpost=fposts($col,$type);
             }
             else{
               $fpost=fposts();
             }
             foreach($fpost as $p){ 
               
               ?>
                <?php include 'single.php'?>
                <?php } ?>
            </div>
            
           
        </div>
            <?php require_once "right_sidebar.php"?>
    </div>
</div>
<?php require_once("front_panel/foot.php") ?>

    
