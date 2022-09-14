<?php require_once "core/auth.php" ?>
<?php include "template/header.php"?>

<div class="row">
                    <div class="col-12"> 
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>post_list.php"><i class="feather-package ml-1"  style="letter-spacing: 5px;"></i>Post</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-upload-cloud ml-1 " style="letter-spacing: 5px;"></i>Add Post</li>
                            </ol>
                          </nav>
                    </div>
                </div>
                <?php

                    if(isset($_POST['postAdd'])){

                        post_add();
                    }

                    ?>
                <form class="row" method='post'>
                    <div class="col-12 col-xl-8">
                        <div class="card mb-4 p-3">
                            <div class="card body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">
                                        <i class="feather-plus-circle  mr-1 text-primary"></i>Creat New Post
                                    </h4>
                                    <a href="<?php echo $url ?>post_list.php" class="btn btn-outline-primary"><i class="feather-list"></i></a>
                                </div>
                                <hr>
                               
                                   <div class="form-group">
                                       
                                        <label for="">Post Title</label>
                                       <input type="text" class='form-control' name='title' required>

                                   </div>
                                   <div class="form-group">
                                       
                                       <label for="">Post Description</label>
                                      <textarea type="text"  name='description' id='description'  class='form-control' required> </textarea>

                                  </div>
                                  
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h4 class="mb-0">
                                        <i class="feather-layers  mr-1 text-primary"></i>Select Category
                                    </h4>
                                    <a href="<?php echo $url ?>category_list.php" class="btn btn-outline-primary"><i class="feather-list"></i></a>
                                </div>
                                <div class="form-group">
                                        <?php
                                            foreach(categories() as $c){
                                        ?>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio<?php echo $c['id']?>" value="<?php echo $c['id']?>" id='category_id' name="category_id" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio<?php echo $c['id']?>"><?php echo $c['title']?></label>
                                            </div>                                         
                                        <?php
                                            }
                                        ?>
                                        </div>
                                          <hr>
                                    <button class="btn btn-primary" name="postAdd">Add Post</button>

                                        </div>
                                    </div>
                    </div>
                 </div>
                  </form>
                 

<?php include "template/footer.php"?>
<script>
    $("#description").summernote({
        placeholder:'HELLO WORLD',
        height:500
    })
</script>