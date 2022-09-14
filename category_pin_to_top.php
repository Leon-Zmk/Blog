<?php 

    require_once "core/auth.php";
    require_once "core/base.php";
    require  "core/functions.php";
   

$id=$_GET['id'];
if(category_pin_to_top($id)){
    linkto('category_add.php');
}



