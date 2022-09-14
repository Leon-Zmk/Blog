<?php require_once "core/auth.php" ?>
<?php include "template/header.php"?>

<div class="row">
                    <div class="col-12"> 
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-archive ml-1 " style="letter-spacing: 5px;"></i>Manage Advertisement</li>
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>ads_section_zero.php"><i class="feather-anchor ml-1"  style="letter-spacing: 5px;"></i>Add Advertisement</a></li>
                            </ol>
                          </nav>
                    </div>
                </div>
                <?php

                    if(isset($_POST['ads_add'])){

                        ads_add();
                    }

                    ?>
                <form class="row" method='post' enctype='multipart/form-data'>
                    <div class="col-12 col-xl-8">
                        <div class="card mb-4 p-3">
                            <div class="card body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">
                                        <i class="feather-plus-circle  mr-1 text-primary"></i>Add New Ads
                                    </h4>
                                    <a href="<?php echo $url ?>ads_list.php" class="btn btn-outline-primary"><i class="feather-list"></i></a>
                                </div>
                                <hr>
                               
                                   <div class="form-group">            
                                        <label for="">Ads Link</label>
                                       <input type="text" name='ads_link' class='form-control' required>

                                   </div>

                                   <div class="form-group">            
                                        <label for="">Ads Owner</label>
                                       <input type="name" name='ads_owner_name' class='form-control' required>
                                   </div>

                                   <div class="form-group">                    
                                       <label for="">Ads Photo</label>
                                        <input type="file" name='ads_photo' class='form-control p-1' required>
                                  </div>
                                  
                            </div>
                        </div>
                    </div>
                  <div class="col-12 col-xl-4">
                      <div class="card">
                          
                          <div class="card-body">
                          <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">
                                        <i class="feather-plus-circle  mr-1 text-primary"></i>Add Date Timer
                                    </h4>
                                </div>
                                <hr>
                              <div class="form-group ">
                                  <label for="">Start Date</label>
                                  <input type="date" name='start_date' class='form-control'>
                              </div>
                              <div class="form-group ">
                                  <label for="">End Date</label>
                                  <input type="date" name='end_date' class='form-control'>
                              </div>
                              <button class='btn btn-primary' name='ads_add'>Add Ads</button>
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