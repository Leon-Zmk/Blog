<?php require_once("front_panel/head.php") ?>
<title>Home</title>
<?php require_once("front_panel/side_head.php") ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>index.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-info ml-1 " style="letter-spacing: 5px;"></i> <?php echo category($_GET['category_id'])['title']?></li>

                            </ol>
                          </nav>
                <div class="">
             <?php foreach(fpostbycat($_GET['category_id']) as $p){ ?>
                <?php include "single.php" ?>
                <?php } ?>
            </div>
            
           
        </div>
            <?php require_once "right_sidebar.php"?>
    </div>
</div>
<?php require_once("front_panel/foot.php") ?>

    
