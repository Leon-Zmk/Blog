<?php require_once "core/auth.php" ?>
<?php include "template/header.php"?>

<div class="row">
<div class="col-12"> 
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $url ?>dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $url ?>category_add.php"><i class="feather-layers"  style="letter-spacing: 5px;"></i>Category</a></li>
</ol>
</nav>
</div>
</div>
<div class="row">
<div class="col-12 col-xl-8">
<div class="card mb-4 p-3">
<div class="card body">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            <i class="feather-layers"></i>Category Update
        </h4>
        <a href="<?php echo $url ?>category_add.php" class=" btn btn-outline-primary"><i class="feather-plus-circle"></i></a>
    </div>
    <hr>
    <?php
         $id=$_GET['id'];
         $current=category($id);

        if(isset($_POST['update_btn'])){

            category_update();

        }

    ?>
    <form action="#" method="POST">
        
        <div class="form-inline">
        <input type="hidden" value=<?php echo $id?> name='id'>
        <input type="text" class="form-control mr-2" value=<?php echo $current['title']?> name='title'>
        <button class="btn  btn-primary" name='update_btn'>Category Update</button>

        </div>       

        
    </form>

            
           <?php include "category_list.php" ?>
</div>
</div>
</div>
</div>
</div>

<?php include "template/footer.php"?>