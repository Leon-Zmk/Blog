<div class="col-12 col-md-4">
                <div class="front-panel-right-sidebar">
                <div class="card">
                    <div class="card-body">
                        
                       <?php

                        if(isset($_SESSION['user']['id'])){


                       ?>
                            <p>
                                Hi  
                                <?php echo $_SESSION['user']['name'] ?>
                            </p>
                            <a href="dashboard.php" class='btn btn-primary'>Go Dashboard</a>
                       <?php }else{?>
                             <p>
                                Hi Guest
                            </p>
                            <a href="register.php" class='btn btn-primary'>Register</a>
                       <?php }?>
                    </div>
                </div>

                            <h4>Categories</h4>
                    <div class="list-group mb-4">
                    <a href="<?php echo $url ?>index.php" class="list-group-item list-group-item-action <?php  echo isset($_GET['category_id'])? "":"active" ?>">All Categories</a>
                        <?php foreach(fcategories() as $c){ ?>
                            <a href="category_based_post.php?category_id=<?php echo $c['id'] ?>" class="list-group-item list-group-item-action <?php  echo isset($_GET['category_id'])? $_GET['category_id']==$c['id']?"active":"":"" ?>">
                            <?php if($c['ordering']==1){ ?>
                                <i class='feather-paperclip text-primary'></i>
                            <?php } ?>
                            <?php echo $c['title']?>
                            </a>
                        <?php } ?>
                    </div>
                   <div class="">
                       <div class="card">
                           <div class="card-body">
                               <form action="search_by_date.php" method='post'>
                                   <div class="form-group">
                                       <label for="">Start</label>
                                       <input type="date" class='form-control' name='start' required>
                                   </div>
                                   <div class="form-group">
                                       <label for="">End</label>
                                       <input type="date" class='form-control' name='end' required>
                                   </div>
                                   <button class='btn btn-primary'>
                                       <i class="feather-calendar"></i>
                                       Search
                                   </button>
                               </form>
                           </div>
                       </div>
                   </div>
                    </div>
                </div>