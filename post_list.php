<?php require_once "core/auth.php" ?>
<?php include "template/header.php"?>

<div class="row">
                    <div class="col-12"> 
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-upload-cloud ml-1 " style="letter-spacing: 5px;"></i>Post</li>
                            </ol>
                          </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4 p-3">
                            <div class="card body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">
                                        <i class="feather-list text-primary mr-1"></i>Post List
                                    </h4>
                                   <div>
                                   <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2 "></i></a>
                                    <a href="<?php echo $url ?>post_add.php" class="btn btn-outline-primary"><i class="feather-plus-circle"></i></a>
                                   </div>
                                </div>
                                <hr>
                                <table class='table table-hover table-bordered mt-2'>

<thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <?php if($_SESSION['user']['role']==0){ ?>
        <th>User</th>
        <?php }?>
        <th>Viewer Count</th>
        <th>Control</th>
        <th>Created_at</th>

    </tr>
</thead>

<tbody>
    
    <?php
       
        foreach(posts() as $c){

    ?>
    <tr>
        <td><?php echo $c['id'] ?></td>
        <td><?php echo short($c['title']) ?></td>
        <td><?php echo short(strip_tags(html_entity_decode($c['description'])))?> </td>
        <td class="text-nowrap"><?php echo category($c['category_id'])['title'] ?></td>
        <?php if($_SESSION['user']['role']==0){ ?>
            <td class='text-nowrap'><?php echo user($c['user_id'])['name'] ?></td>
        <?php }?>
        <td>
            <?php echo count(viewerCountByPost($c['id'])) ?>
        </td>
        <td class='text-nowrap'>
        </a>
            <a href="post_detail.php?id=<?php echo $c['id'] ?>" name="detail-btn" >
           <i class='feather-info btn-delete btn btn-outline-primary fa-fw btn-sm'></i>
        </a>
            <a href="post_delete.php?id=<?php echo $c['id'] ?>" name="delete-btn" onclick='return confirm("Are You Sure")' >
           <i class='feather-trash-2 btn-delete btn btn-outline-danger fa-fw btn-sm'></i>
        </a>
            <a href="post_update.php?id=<?php echo $c['id'] ?>" name="update-btn" >
           <i class='feather-edit-2 btn-delete btn btn-outline-danger fa-fw btn-sm'></i>
        </a>
        </td>
        <td class='text-nowrap'><?php echo strtime( $c['create_at'],'d-m-Y') ?></td>
    </tr>
    <?php
        }

        
      
    ?>
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