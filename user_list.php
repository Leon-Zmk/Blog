<?php require_once "core/auth.php" ?>
<?php require_once "core/isadmin.php"?>
<?php include "template/header.php"?>

<div class="row">
                    <div class="col-12"> 
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-user" style="letter-spacing: 5px;"></i>Users</li>
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
                                        <i class="feather-users text-primary mr-1"></i>User List
                                    </h4>
                                    <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2 "></i></a>

                                </div>
                                <hr>
                                <table class='table table-hover mt-2'>

<thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Control</th>
        <th>Created_at</th>

    </tr>
</thead>

<tbody>
    
    <?php
       
        foreach(userlist() as $c){

    ?>
    <tr>
        <td><?php echo $c['id'] ?></td>
        <td><?php echo $c['name']?></td>
        <td><?php echo $c['email']?></td>
        <td><?php echo $roles[$c['role']]?></td>
        <td></td>
        <td><?php echo strtime( $c['creat_at'],'d-m-Y') ?></td>
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