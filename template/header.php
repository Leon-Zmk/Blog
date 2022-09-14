<?php include "core/base.php";?>
<?php include "core/functions.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url ;?>assests/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url ;?>assests/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url ?>assests/vendor/data_table/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url ;?>assests/css/style.css">
</head>
<body>
    <section class="container-fluid">
        <div class="row">
            <!-- side-bar -->
            <?php include "sidebar.php";?>
            <!-- side-bar -->
            <div class="col-12 col-lg-9 col-xl-10 vh-100  content overflow-auto">
                <div class="row header mb-4">
                    <div class="col-12">
                        <div class=" p-2 bg-primary rounded d-flex justify-content-between align-items-center">
                            <button class="show-sidebar-btn btn btn-primary d-block d-lg-none "><i class="feather-menu"></i></button>
                            <form action="" method="POST" class="d-none d-md-block">
                                <div class="form-inline">
                                    <input type="text" class="form-control mr-2">
                                    <button class="btn btn-light text-primary"><i class="feather-search"></i></button>
                                </div>
                            </form>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="<?php echo $url ?>assests/img/<?php echo $_SESSION['user']['photo'] ?>" class="user-img" alt=""> <?php echo $_SESSION['user']['name'] ?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="#">Log Out</a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>