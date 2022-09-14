<?php require_once "core/auth.php" ?>
<?php include "template/header.php"?>
<?php

$id=$_GET['id'];
$current=post($id);
?>

<div class="row">
                    <div class="col-12"> 
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-layers ml-1 " style="letter-spacing: 5px;"></i>Post</li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-layers ml-1 " style="letter-spacing: 5px;"></i><?php echo $current['title'] ?></li>

                            </ol>

                          </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card mb-4 p-3">
                            <div class="card body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">
                                        <i class="feather-info text-primary mr-1"></i>Post Detail
                                    </h4>
                                   <div>
                                   <a href="<?php echo $url ?>post_add.php" class="btn btn-outline-primary"><i class="feather-plus-circle"></i></a>
                                    <a href="<?php echo $url ?>post_list.php" class="btn btn-outline-primary"><i class="feather-list"></i></a>
                                   </div>
                                </div>
                                <hr>

                                <h4>
                                    <?php echo $current['title'] ?>
                                </h4>
                                <div >
                                    <i class='feather-user text-primary'></i>
                                    <?php echo user($current['user_id'])['name'] ?>

                                    <i class='feather-layers text-primary'></i>
                                    <?php echo category($current['category_id'])['title'] ?>

                                    <i class='feather-calendar text-danger'></i>
                                    <?php echo date("j M Y",strtotime($current['create_at'])) ?>
                                </div>
                                <div>
                                    <?php echo html_entity_decode($current['description']) ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">
                                        <i class="feather-users text-primary mr-1"></i>Post Viewers
                                    </h4>
                                   <div>
                                   <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2 "></i></a>
                                   </div>
                                </div>
                                <hr>
                            <table class='table table-bordered table-hover'>
                                <thead>
                                    <tr>
                                        <th>Who</th>
                                        <th>Device</th>
                                        <th>Create_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (viewerCountByPost($id) as $c){ ?>
                                        <tr>
                                            <td class='text-nowrap text-capitalize'>
                                               <?php if(user($c['user_id'])==0){
                                                    echo "Guest";
                                               }else{
                                               echo user($c['user_id'])['name'] ;
                                               }
                                               
                                               ?>
                                            </td>
                                            <td><?php echo $c['device'] ?></td>
                                            <td class='text-nowrap'><?php echo $c['create_at'] ?></td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

<?php include "template/footer.php"?>
<script>

    $('.table').dataTable({
        "order":[[0,'desc']]
    });
</script>