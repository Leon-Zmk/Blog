<?php session_start() ?>
<?php require_once("front_panel/head.php") ?>
<title>Home</title>
<?php require_once("front_panel/side_head.php") ?>
<?php


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $current=post($id);
    $category=$current['category_id'];
}else{
    linkto("index.php");
}

if(!$current){
    linkto("index.php");
}

if(isset($_SESSION['user']['id'])){
    $user_id=$_SESSION['user']['id'];
}
else{
    $user_id=0;
}
viewerRecord($user_id,$id,$_SERVER['HTTP_USER_AGENT']);
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="<?php echo $url ?>index.php"><i class="feather-home ml-1"></i> Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page"><i class="feather-info ml-1 " style="letter-spacing: 5px;"></i>Post Detail</li>
                            </ol>
                          </nav>
                <div class="">
                    <div class="card post mb-4">
                        <div class="card-body">
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
            <div class="row">
            <?php foreach(fpostbycat($category,2,$id) as $p){ ?>
                <div class="col-12 col-md-6">
              
                <div class="card post shadow-sm mb-4">
                    <div class="card-body">
                        <a href="detail.php?id=<?php echo $p['id']?>" class='text-primary'>
                            <h4><?php echo $p['title'] ?></h4>
                        </a>
                        <div class='my-3'>
                                    <i class='feather-user text-primary'></i>
                                    <?php echo user($p['user_id'])['name'] ?>

                                    <i class='feather-layers text-primary'></i>
                                    <?php echo category($p['category_id'])['title'] ?>

                                    <i class='feather-calendar text-danger'></i>
                                    <?php echo date("j M Y",strtotime($p['create_at'])) ?>
                                </div>
                        <p class='text-black-50'>
                          <?php echo short(strip_tags(html_entity_decode($p['description'])),200)?>                        
                        </p>
                    </div>
                </div>
                </div>
                <?php } ?>
            </div>
           
        </div>
            <?php require_once "right_sidebar.php"?>
    </div>
</div>
<?php require_once("front_panel/foot.php") ?>

    
