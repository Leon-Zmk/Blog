<?php

include "core/base.php";
include "core/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="<?php echo $url ;?>/assests/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $url ;?>/assests/vendor/feather-icons-web/feather.css">
<link rel="stylesheet" href="<?php echo $url ;?>/assests/css/style.css">

</head>
<body style='background:var(--primary-soft)'>
    

<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                <h4 class='text-primary text-center'>
                            <i class='feather-users'></i>
                            Register
                        </h4>
                        <hr>
                    <?php

                    if(isset($_POST['btn-reg'])){

                        echo register();
                    }

                    ?>

                    <form action="" method='post'>
                        <div class="form-group">
                            <label for="">
                             <i class='feather-user text-primary'></i>
                             Your Name
                            </label>
                            <input type="name" name='name' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">
                             <i class='feather-mail text-primary'></i>
                             Your Mail
                            </label>
                            <input type="email" name='email' class="form-control" required>
                        </div><div class="form-group">
                            <label for="">
                             <i class='feather-lock text-primary'></i>
                             Password
                            </label>
                            <input type="password" name='password' class="form-control" min=8 required>
                        </div><div class="form-group">
                            <label for="">
                             <i class='feather-lock text-primary'></i>
                             Confirme Password
                            </label>
                            <input type="password" name='cpassword' class="form-control" min=8 required>
                        </div>
                        <div class="form-group">
                            <button class='btn btn-primary' name='btn-reg'>Register</button>
                            <a href="login.php" class='btn btn-outline-primary'>Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


       
<script src="<?php echo $url ?>/assests/vendor/jquery-3.3.1.min.js"></script>
<script src="<?php echo $url ?>/assests/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="<?php echo $url ?>/assests/js/app.js"></script>
          
</body>
</html>