<?php require_once "core/auth.php" ?>
<?php require_once "core/iseditor_and_isadmin.php" ?>
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
            <i class="feather-layers"></i>Category Add
        </h4>
        <a href="<?php echo $url ?>category_add.php" class="btn btn-outline-primary"><i class="feather-plus-circle"></i></a>
    </div>
    <hr>
    <?php
        
        if(isset($_POST['cat_btn'])){

            category_add();

        }

    ?>
    <form action="#" method="POST">
        
        <div class="form-inline">
        
        <input type="text" class="form-control mr-2" name='title'>
        <button class="btn btn-primary" name='cat_btn'>Category Add</button>

        </div>       

        
    </form>

            
           <?php include "category_list.php" ?>
</div>
</div>
</div>
</div>
</div>

<?php include "template/footer.php"?>