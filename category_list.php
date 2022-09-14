<table class='table table-hover mt-2'>

<thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>User</th>
        <th>Control</th>
        <th>Created_at</th>

    </tr>
</thead>

<tbody>
    
    <?php
       
        foreach(categories() as $c){

    ?>
    <tr>
        <td><?php echo $c['id'] ?></td>
        <td><?php echo $c['title'] ?></td>
        <td><?php echo user($c['user_id'])['name'] ?></td>
        <td>
            <a href="category_delete.php?id=<?php echo $c['id'] ?>" name="delete-btn" onclick='return confirm("Are You Sure")' >
           <i class='feather-trash-2 btn-delete btn btn-outline-danger fa-fw btn-sm'></i>
        </a>
            <a href="category_update.php?id=<?php echo $c['id'] ?>" name="update-btn" >
           <i class='feather-edit-2 btn-delete btn btn-outline-warning fa-fw btn-sm'></i>
        </a>
        <?php if($c['ordering']!='1') {?>
        <a href="category_pin_to_top.php?id=<?php echo $c['id'] ?>" name="pin-btn" >
           <i class='feather-upload btn-delete btn btn-outline-info fa-fw btn-sm'></i>
        </a>
        <?php }else{?>
            <a href="category_remove_pin.php" name="pin-btn" >
           <i class='feather-arrow-down btn-delete btn btn-outline-info fa-fw btn-sm'></i>
        </a>
        <?php } ?>
        </td>
        <td><?php echo strtime( $c['creat_at'],'d-m-Y') ?></td>
    </tr>
    <?php
        }

        
      
    ?>
</tbody>

</table>
