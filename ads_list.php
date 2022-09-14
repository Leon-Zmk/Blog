<?php require_once "core/auth.php" ?>
<?php require_once "core/isadmin.php"?>
<?php include "template/header.php"?>

<div class="row">
                    <div class="col-12"> 
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $url ?>dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-archive ml-1 " style="letter-spacing: 5px;"></i>Manage Advertisement</li>
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>ads_list.php"><i class="feather-list ml-1"  style="letter-spacing: 5px;"></i>Ads List</a></li>
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
                                        <i class=" feather-list text-primary mr-1"></i>Ads List
                                    </h4>
                                    <a href="#" class="btn btn-outline-secondary full-screen-btn"><i class="feather-maximize-2 "></i></a>

                                </div>
                                <hr>
                                <table class='table table-hover mt-2'>

<thead>
    <tr>
        <th>Id</th>
        <th>Owner_name</th>
        <th>Photo</th>
        <th>Link</th>
        <th>Control</th>
        <th>Start</th>
        <th>End</th>
        <th>Created_at</th>

    </tr>
</thead>

<tbody>
    
    <?php
       
        foreach(show_ads_into_list() as $ads){

    ?>
    <tr>
        <td><?php echo $ads['id'] ?></td>
        <td><?php echo $ads['Owner_name']?></td>
        <td><?php echo $ads['photo']?></td>
        <td><?php echo $ads['link']?></td>
        <td class='text-nowrap'>
            <a href="delete_ads.php?id=<?php echo $ads['id'] ?>" name="delete-btn" onclick='return confirm("Are You Sure")' >
           <i class='feather-trash-2 btn-delete btn btn-outline-danger fa-fw btn-sm'></i>
        </a>
        </td>
        <td class='text-nowrap'><?php echo $ads['start']?></ class='text-nowrap'>
        <td class='text-nowrap'><?php echo $ads['end']?></td>
        <td class='text-nowrap'><?php echo strtime( $ads['creat_at'],'d-m-Y') ?></td>
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