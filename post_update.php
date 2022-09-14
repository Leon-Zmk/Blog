<?php require_once "core/auth.php" ?>
<?php include "template/header.php"?>

<div class="row">
<div class="col-12"> 
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $url ?>/post_list.php"><i class="feather-package ml-1"  style="letter-spacing: 5px;"></i>Post</a></li>
            <li class="breadcrumb-item active" aria-current="page"><i class="feather-upload-cloud ml-1 " style="letter-spacing: 5px;"></i>Add Post</li>
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
                    <i class="feather-plus-circle  mr-1 text-primary"></i>Add Post
                </h4>
                <a href="<?php echo $url ?>post_list.php" class="btn btn-outline-primary"><i class="feather-list"></i></a>
            </div>
            <hr>
            <?php

                    $id=$_GET['id'];
                    $current=post($id);

                    if(isset($_POST['update_post'])){

                    if(post_update()){
                        linkto("post_list.php");
                    }

                    }

            ?>
            <form action="#" method="POST">
                <div class="form-group">
                    <input type="hidden" value=<?php echo $id?> name='id'> 
                    <label for="">Post Title</label>
                    <input type="text" class='form-control' value='<?php echo $current['title'] ?>' name='title' required>

                </div>
                <div class="form-group">
                    <select name="category_id" class='custom-select' id="">

                    <?php
                        foreach(categories() as $c){
                    ?>
                        <option value="<?php echo $c['id']?>" <?php echo $current['category_id']==$c['id']?"selected":""?>><?php echo $c['title']?></option>
                    <?php
                        }
                    ?>

                    </select>
                </div>
                <div class="form-group">
                    
                    <label for="">Post Description</label>
                    <textarea type="text" name='description'  rows=8 class='form-control' required><?php echo $current['description'] ?> </textarea>

                </div>
                <hr>
                <button class="btn btn-primary" name="update_post">Update Post</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<?php include "template/footer.php"?>