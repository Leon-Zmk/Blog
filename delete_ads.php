<?php 

    require_once "core/auth.php";
    require_once "core/base.php";
    require  "core/functions.php";
   

$id=$_GET['id'];
if(ads_delete($id)){
    linkto('ads_list.php');
}
