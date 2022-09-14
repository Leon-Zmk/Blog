<?php 

    require_once "core/auth.php";
    require_once "core/base.php";
    require  "core/functions.php";
   

$id=$_GET['id'];
if(post_delete($id)){
    linkto('post_list.php');
}

