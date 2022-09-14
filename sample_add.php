<?php include "template/header.php"?>

<div class="row">
                    <div class="col-12"> 
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>/index.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>/item_list.php"><i class="feather-package ml-1"  style="letter-spacing: 5px;"></i>Item</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-upload-cloud ml-1 " style="letter-spacing: 5px;"></i> Add Item</li>
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
                                        <i class="feather-plus-circle text-primary"></i>Add Item
                                    </h4>
                                    <a href="<?php echo $url ?>/item_list.php" class="btn btn-outline-primary"><i class="feather-list"></i></a>
                                </div>
                                <hr>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label for="upload">
                                                    Photo upload
                                                 
                                                </label>
                                                <i class="feather-info" title="Only Support Jpg,Png"></i>
                                                <input type="file" id="upload" name="photo" class="form-control p-1">
                                            </div>
                                                <div class="form-group">
                                                    <label for="name">Item Name</label>
                                                    <input type="text" name="name" id="name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="t">Type</label>
                                                   <select type="text" id="t" name="type" class="form-control custom-select">
                                                    <option value="0">ကုန်ဆို</option>
                                                    <option value="0">ကုန်ဆို</option>
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="c">Category</label>
                                                   <select type="text" id="c" name="Category" class="form-control custom-select">
                                                        <option value="" selected disabled>Select Category</option>
                                                 
                                                   </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sc">Sub Category</label>
                                                   <select type="text" id="sc" name="sub-category" class="form-control custom-select">
                                                        <option value="" selected disabled>Select Sub Category</option>
                                                   </select>
                                                </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="q">Item Quantity</label>
                                                    <input type="text" id="q" name="quantity" class="form-control">
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="U">Units</label>
                                                       <select type="text" id="U" name="Units" class="form-control custom-select">
                                                        <option value="0"></option>
                                                        <option value="0"></option>
                                                       </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" id="price" name="price" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="des">Description</label>
                                                <textarea type="number" id="des" name="des" rows="8" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary">Add Item</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

<?php include "template/footer.php"?>