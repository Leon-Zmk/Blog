<?php require_once("front_panel/head.php") ?>
<title>Home</title>
<?php require_once("front_panel/side_head.php") ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>index.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-info ml-1 " style="letter-spacing: 5px;"></i> 
                                Search Posts Between &nbsp; "<?php echo $_POST['start'] ?> and &nbsp; "<?php echo $_POST['end'] ?> "
                            </li>
                            </ol>
                          </nav>
                <div class="">
                    <?php 
                    $result=searchbydate($_POST['start'],$_POST['end']);
                    if(count($result)==0){
                        echo alert("There Is No Result","warning");
                    }
                    
                    ?>
             <?php foreach($result as $p){ ?>
               <?php include "single.php"?>
                <?php } ?>
            </div>
            
           
        </div>
            <?php require_once "right_sidebar.php"?>
    </div>
</div>
<?php require_once("front_panel/foot.php") ?>

    
