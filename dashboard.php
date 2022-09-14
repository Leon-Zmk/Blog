<?php require_once "core/auth.php" ?>
<?php include "template/header.php"?>

<div class="row">
                   <div class="col-12 col-md-6  col-xl-3">
                        <div class="card mb-3 card-status" onclick='go("<?php echo $url ?>/dashboard.php")'>
                            <div class="card-body p-1">
                                <div class="row align-items-center">
                                        <div class="col-3">
                                        <i class="feather-heart h1 text-primary"></i>
                                    </div>
                                    <div class="col-8">
                                        <p class="h4 mb-2 font-weight-bolder"><span class="counter-up"><?php echo countTotal('viewer') ?></span></p>
                                        <p class="text-black-50 mb-0">Total Visitor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="col-12 col-md-6  col-xl-3">
                    <div class="card mb-3 card-status" onclick='go("<?php echo $url ?>/post_list.php")'>
                        <div class="card-body p-1">
                            <div class="row align-items-center">
                                    <div class="col-3">
                                    <i class="feather-list h1 text-primary"></i>
                                </div>
                                <div class="col-8">
                                    <p class="h4 mb-2 font-weight-bolder"><span class="counter-up"><?php echo countTotal('post') ?></span></p>
                                    <p class="text-black-50 mb-0">Total Post</p>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="col-12 col-md-6  col-xl-3">
                <div class="card mb-3 card-status" onclick="go('<?php echo $url ?>/category_add.php')">
                    <div class="card-body p-1">
                        <div class="row align-items-center">
                                <div class="col-3">
                                <i class="feather-layers h1 text-primary"></i>
                            </div>
                            <div class="col-8">
                                <p class="h4 mb-2 font-weight-bolder"><span class="counter-up"><?php echo countTotal('category') ?></span></p>
                                <p class="text-black-50 mb-0">Total Category</p>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <div class="col-12 col-md-6  col-xl-3">
            <div class="card mb-3 card-status" onclick='go("<?php echo $url ?>/user_list.php")'>
                <div class="card-body p-1">
                    <div class="row align-items-center">
                            <div class="col-3">
                            <i class="feather-users h1 text-primary"></i>
                        </div>
                        <div class="col-8">
                            <p class="h4 mb-2 font-weight-bolder"><span class="counter-up"><?php echo countTotal('users') ?></span></p>
                            <p class="text-black-50 mb-0">Total User</p>
                        </div>
                    </div>
                </div>
            </div>
       </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-7 ">
                        <div class="card mb-3 overflow-hidden shadow">
                            <div class="p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                  <h4 m-0>Daily Viewer & Transition</h4 m-0>

                                <div class="">
                                    <img src="<?php echo $url ?>assests/img/avatar2.jpg" class="users rounded-circle" alt="">
                                    <img src="<?php echo $url ?>assests/img/avatar3.jpg" class="users rounded-circle" alt="">
                                    <img src="<?php echo $url ?>assests/img/avatar4.jpg" class="users rounded-circle" alt="">
                                    <img src="<?php echo $url ?>assests/img/avatar5.jpg" class="users rounded-circle" alt="">
                                    <img src="<?php echo $url ?>assests/img/avatar1.jpg" class="users rounded-circle" alt="">
                                </div>
                            </div>
                            <canvas id="ov" width="400" height="175"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5 ">
                <div class="card overflow-hidden">
                    <div class="card-body rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 m-0>Categories/Posts</h4 m-0>
        
                          <div class="">
                            <i class="feather-pie-chart text-primary h4"></i>
                          </div>
                    </div>
                    <canvas id="myChart"  height="200"></canvas>
                </div>
            </div>
        </div> 
            
            </div>
        <?php

        $current=$_SESSION['user']['id'];
        $totalpost=countTotal('post');
        $currentusertotalpost=countTotal('post',"user_id=$current");
        $currentuserpostpercentage=($currentusertotalpost/$totalpost)*100;

       
        



        ?>
        <div class="col-12 p-0">
            <div class="card mb-0 over">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="m-0 p-2 font-weight-bolder">Subscriber List</h4>
    
                      <div class="">
                          <small>Your Post : <?php echo $currentuserpostpercentage ?>%</small>
                          <div class="progress" style='width:300px;height:8px;'>
                            <div class="progress-bar" role="progressbar" style='width:<?php echo $currentuserpostpercentage ?>%' aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                      </div>
                </div>
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
                        
                            foreach(dposts(5) as $c){

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

<?php include "template/footer.php"?>
<script>
    $('.counter-up').counterUp({
    delay:50,
    time: 1500
});
function go(url){
    setTimeout (function(){
        location.href=`${url}`
    },1000)
}


<?php 

$datearr=[];
$dailyviewer=[];
$dailytransition=[];
$today=date('Y-m-d');

for($i=0;$i<10;$i++){

    $date=date_create($today);
    date_sub($date,date_interval_create_from_date_string("$i days"));
    $current=date_format($date,'Y-m-d');
    array_push($datearr,$current);
    array_push($dailyviewer,countTotal('viewer',"CAST(create_at AS DATE)='$current'"));
    array_push($dailytransition,countTotal('transition',"CAST(create_at AS DATE)='$current'"));
}



?>
let date=<?php echo json_encode($datearr) ?>;
let Viewer=<?php echo json_encode($dailyviewer) ?>;
let Transition=<?php echo json_encode($dailytransition) ?>;
var ctx = document.getElementById('ov').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels:date,
        datasets: [{
            label: 'Daily Viewer',
            data:Viewer,
            backgroundColor: [
               '#007bff30'
            
            ],
            borderColor: [
               '#007bff',
               
            ],
            borderWidth: 1,
            tension:0
        },{
            label: 'Transition Count',
            data:Transition,
            backgroundColor: [
               '#007eff30'
            
            ],
            borderColor: [
               '#007eff',
               
            ],
            borderWidth: 1,
            tension:0
        }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes:[
                {
                    display:false,
                    gridLines:{
                        display:false
                    }
                }
            ]
        },legend:{
            display:true,
            position:'top',
            labels:{
                fontcolor:'#333',
                usePointStyle:true
            }
        }
    }
});

<?php 

$catarr=[];
$postarr=[];

foreach(categories() as $c){
    array_push($catarr,$c['title']);
    array_push($postarr,countTotal('post',"category_id={$c['id']}"));
}
?>

let category=<?php echo json_encode($catarr) ?>;
let posts=<?php echo json_encode($postarr) ?>;
var op = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(op, {
    type: 'doughnut',
    data: {
        labels:category,
        datasets: [{
            label: 'Categories/Posts',
            data: posts,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
             xAxes:[
                {
                    display:false,
                    gridLines:{
                        display:false
                    }
                }
            ]
        },legend:{
            display:true,
            position:'bottom',
            labels:{
                fontcolor:'#333',
                usePointStyle:true
            }
        }
    }
});

</script>