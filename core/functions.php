<?php

//common

function alert($data,$color='danger'){

    return "<p class='alert alert-$color'>$data</p>";

}

function runquery($sql){
    if(mysqli_query(con(),$sql)){
        return true;
    }
    else{
        alert(die('QueryFail'));
    }
}

function fetch($sql){
    $query=mysqli_query(con(),$sql);
    $row=mysqli_fetch_assoc($query);
    return $row;
       
}
function fetchall($sql){
    $query=mysqli_query(con(),$sql);

    $rows=[];

    while($row=mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function redirect($l){
    header("location:$l");
}

function linkto($l){
    echo "<script>location.href='$l'</script>";
}

function strtime($timestamp,$format){
    return date($format,strtotime($timestamp));
}


function short($str,$length=50){
    return  substr($str,0,$length).'...';
}

function countTotal($table,$condition=1){
    $sql="SELECT COUNT(id) FROM $table WHERE $condition";
    $total=fetch($sql);
    return $total['COUNT(id)'];
}

function textfliter($text){
    $text=trim($text);
    $text=htmlentities($text,ENT_QUOTES);
    $text=stripslashes($text);

    return $text;
}

//common end

//user start

function user($id){

    $sql="SELECT * FROM users WHERE id='$id'";
    return fetch($sql);

}

function userlist(){
    $sql="SELECT * FROM users";
    return fetchall($sql);
}


//user end

//auth start

function register(){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if($password==$cpassword){
       
        $hpassword=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$hpassword')";
        
        if(runquery($sql)){
            redirect("login.php");
        }

    }
    else{

        return alert('Password Not Match');
    }

}

function login(){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM users WHERE email='$email'";
    $query=mysqli_query(con(),$sql);
    $row=mysqli_fetch_assoc($query);
     
    if(!$row){
       return alert('Password Or Email Not Match');
    }else{
        
        if(!password_verify($password,$row['password'])){
            return alert('Password Or Email Not Match');

        }else{

            session_start();

            $_SESSION['user']=$row;
            redirect("dashboard.php");

        }
    }
}



//auth end

//category start

function category_add(){
    $title=textfliter(strip_tags($_POST['title']));
    $user_id=$_SESSION['user']['id'];
    
    $sql="INSERT INTO category(title,user_id) VALUES('$title','$user_id')";
    
    if(runquery($sql)){
        linkto("category_add.php");
    }
}

function category($id){
    $sql="SELECT * FROM category WHERE id='$id'";
    return fetch($sql);

}
function categories(){

    $sql="SELECT * FROM category ORDER BY ordering DESC";
    return fetchall($sql);
   
}

function category_delete($id){

    $sql="DELETE FROM category WHERE id=$id";
    return runquery($sql);
}

function category_update(){
    $title=$_POST['title'];
    $id= $_POST['id'];
    $sql="UPDATE category SET title='$title' WHERE id='$id'";
    if(runquery($sql)){
        linkto('category_add.php');
    };
}

function category_pin_to_top($id){
    $sql="UPDATE category SET ordering=0";
    mysqli_query(con(),$sql);
    $sql="UPDATE category SET ordering=1 WHERE id='$id'";
    return runquery($sql);
}
function category_remove_pin(){
    $sql="UPDATE category SET ordering=0";
    return runquery($sql);
}

function is_category($id){
    if(category($id)){
        return $id;
    }
    else{
       
        die(linkto("post_add.php"));
    }
}
//category end

//post start

function post_add(){
    $title=textfliter($_POST['title']);
    $description=textfliter($_POST['description']);
    $category_id=is_category($_POST['category_id']);
    $user_id=$_SESSION['user']['id'];
    
    $sql="INSERT INTO post(title,description,category_id,user_id) VALUES('$title','$description','$category_id','$user_id')";
    if(runquery($sql)){
        linkto("post_add.php");
    }
}


function post($id){
    $sql="SELECT * FROM post WHERE id='$id'";
    return fetch($sql);

}
function posts(){
    $current=$_SESSION['user']['id'];
    if($_SESSION['user']['role']==2){
        $sql="SELECT * FROM post WHERE user_id=$current";
        return fetchall($sql);
    }else{

    $sql="SELECT * FROM post";
    return fetchall($sql);
    }
   
}

function post_delete($id){

    $sql="DELETE FROM post WHERE id=$id";
    return runquery($sql);
}

function post_update(){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $category_id=$_POST['category_id'];
    $id=$_POST['id'];
    $sql="UPDATE post SET title='$title',description='$description',category_id='$category_id' WHERE id=$id";
    
    return runquery($sql);
   
}

//post end

//front Panel start 

function fposts($column="id",$order="DESC"){
    $sql="SELECT * FROM post ORDER BY $column $order";
    return fetchall($sql);
}

function fcategories(){
    $sql="SELECT * FROM category ORDER BY ordering DESC";
    return fetchall($sql);
}

function fpostbycat($category_id,$limit='99999',$post_id=0){
    $sql="SELECT * FROM post WHERE category_id=$category_id AND id != $post_id ORDER BY id DESC LIMIT $limit";
    return fetchall($sql);
}

function fSearch($search_key){
    $sql="SELECT * FROM post WHERE title LIKE '%$search_key%' OR description LIKE '%$search_key%' ORDER BY id DESC";
    return fetchall($sql);
}

function searchbydate($start,$end){
    $sql="SELECT * FROM post WHERE create_at BETWEEN '$start' AND '$end' ORDER BY id DESC";
    return fetchall($sql);
}
//front Panel End

//viewer start

function viewerRecord($user_id,$post_id,$device){
    $sql="INSERT INTO viewer (user_id,post_id,device) VALUES ('$user_id','$post_id','$device')";
    runquery($sql);
}

function viewerCountByPost($post_id){
    $sql="SELECT * FROM viewer WHERE post_id=$post_id";
    return fetchall($sql);
}

function viewerCountByUsers($user_id){
    $sql="SELECT * FROM viewer WHERE user_id=$user_id";
    return fetchall($sql);
}

//viewer end

//ads start

function ads_add(){
    $ads_link=$_POST['ads_link'];
    $ads_tmp_photo=$_FILES['ads_photo']['tmp_name'];
    $ads_photo_name=$_FILES['ads_photo']['name'];
    $owner=$_POST['ads_owner_name'];
    $link=$_POST['ads_link'];
    $start=$_POST['start_date'];
    $end=$_POST['end_date'];
    $sql="INSERT INTO ads (Owner_name,photo,link,start,end) VALUES ('$owner','$ads_photo_name','$link','$start','$end')";
    // die($sql);
    move_uploaded_file($ads_tmp_photo,'assests/img/'.$ads_photo_name);

    return runquery($sql);
}

function show_ads_into_list(){
    $sql="SELECT * FROM ads";
    return fetchall($sql);
}
function show_ads(){
    $start=date("Y-m-d");
    $sql="SELECT * FROM ads WHERE start <='$start' AND end >= '$start'";
    return fetchall($sql);
}

function ads_delete($id){
    $sql="DELETE FROM ads WHERE id=$id";
    return runquery($sql);
}
//ads end

//transition start

function transfer(){
    $from=$_SESSION['user']['id'];
    $to=$_POST['to_user'];
    $amount=$_POST['amount'];
    $description=$_POST['description'];

   
    //from_user update (-)

    $from_user_detail=user($from);
    $leftmoney=$from_user_detail['money']-$amount;
    $sql="UPDATE users SET money='$leftmoney' WHERE id=$from";
    mysqli_query(con(),$sql);

    //to_user_update (+)

    $to_user_detail=user($to);
    $newamount=$to_user_detail['money']+$amount;
    $sql="UPDATE users SET money='$newamount' WHERE id=$to";
    mysqli_query(con(),$sql);

    // transition

    $sql="INSERT INTO transition (from_user,to_user,amount,description) VALUES ('$from','$to','$amount','$description')";
    mysqli_query(con(),$sql);
    linkto('transition.php');    
  

}
function transition(){
    $userid=$_SESSION['user']['id'];
   if($_SESSION['user']['id']==0){
    $sql="SELECT * FROM transition";
   }
   else{
    $sql="SELECT * FROM transition WHERE from_user=$userid OR to_user=$userid";
   }
   return fetchall($sql);
}
//transition end

//dashboard start

function dposts($limit=99999999){
    $current=$_SESSION['user']['id'];
    if($_SESSION['user']['role']==2){
        $sql="SELECT * FROM post  WHERE user_id=$current ORDER BY id DESC LIMIT $limit";
        return fetchall($sql);
    }else{

    $sql="SELECT * FROM  post ORDER BY id DESC LIMIT $limit";
    return fetchall($sql);
    }
}

//dashboard end

//api

function apioutput($arr){
    echo json_encode($arr);
}