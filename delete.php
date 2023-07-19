<?php
 include("./includes/template/header.php");
 require_once("./connect_db.php");
 require("./includes/functions/functions.php");
 

if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['stu_id'])){
        delete_with_id('student',$_GET['stu_id']);
    }
}


 
    
  