<?php

function con(){
    
    return mysqli_connect('localhost','root','','blog'); 
    
}

$data=array(
    'name'=>'Sample Blog',
    'short'=>'SB',
    'description'=>'A simple blog For Students',
);

date_default_timezone_set('Asia/Yangon');

$roles=['admin','editor','user'];


$url="http://{$_SERVER["HTTP_HOST"]}/bsd_revision/sample_blog/";