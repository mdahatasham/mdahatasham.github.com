<?php
session_start();
if($_SESSION['username']==''){
    header('Location:admin_login.php');
}
include("../include/db_connect.php");
include("../core_php/admin_online.php");
if(session_destroy()){
    admin_logouttime($_SESSION['username']);
  ofline_user($_SESSION['username']);
  header('Location:admin_login.php');  
}


?>