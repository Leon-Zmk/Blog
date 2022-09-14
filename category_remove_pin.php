<?php 

    require_once "core/auth.php";
    require_once "core/base.php";
    require  "core/functions.php";
   


if(category_remove_pin()){
    linkto('category_add.php');
}



