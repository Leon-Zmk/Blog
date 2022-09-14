<?php require_once "core/auth.php" ?>
<?php require_once "core/iseditor_and_isadmin.php" ?>
<?php include "template/header.php"?>

<?php
        
        if(isset($_POST['transfer_btn'])){

           transfer();
           

        }

    ?>
<div class="row">
<div class="col-12"> 
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo $url ?>dashboard.php"><i class="feather-home ml-1"></i> Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo $url ?>transition.php"><i class="feather-dollar-sign"  style="letter-spacing: 5px;"></i>Wallet</a></li>
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
            <i class="feather-dollar-sign"></i>Wallet
        </h4>

        <button class='btn btn-outline-primary'>
            <i class='feather-user'></i>
            <?php echo user($_SESSION['user']['id'])['money'] ?>
        </button>
    </div>
    <hr>

   
    <form action="#" method="POST">

        
        <div class="form-inline">
        
        <select name="to_user" id="" class='custom-select' required>

             <option value="0" selected disabled>Select  User</option>

            <?php foreach(userlist() as $user){ ?>
                        <?php if($user['id']!=$_SESSION['user']['id']){?>

                        <option value="<?php echo $user['id'] ?>"><?php echo $user['name']?></option>

                <?php } ?>
            <?php   } ?>

        </select>


        <input type="number" min='100' max='<?php echo $user['money'] ?>'  class="form-control mr-2" name='amount' placeholder='Amount' required>

        <input type="text" class="form-control mr-2" name='description' required>
        <button class="btn btn-primary" name='transfer_btn'>Transfer</button>

        </div>       

        
    </form>

    <hr>

    <table class='table table-hover'>
        <thead>
            <tr>
                <th>Id</th>
                <th>From_user</th>
                <th>To_user</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Create_at</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach(transition() as $tr){ ?>
                    <tr>
                        <td><?php echo $tr['id']?></td>
                        <td><?php echo user($tr['from_user'])['name']?></td>
                        <td><?php echo user($tr['to_user'])['name']?></td>
                        <td><?php echo $tr['amount']?></td>
                        <td><?php echo $tr['description']?></td>
                        <td><?php echo date('d-m-Y / h:i',strtotime($tr['create_at']))?></td>
                    </tr>
            <?php } ?>
            
        </tbody>
    </table>

            
</div>
</div>
</div>
</div>
</div>

<?php include "template/footer.php"?>