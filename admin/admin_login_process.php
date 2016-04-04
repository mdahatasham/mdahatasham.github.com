<?php
session_start();
include("../include/db_connect.php");
include("../core_php/admin_online.php");
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM admin WHERE(username='$username'and password='$password')";
$query=mysql_query($sql);
$rows=mysql_fetch_array($query);

    $admin=$rows['username'];
    $adminpass=$rows['password'];
      if($_POST['username']=="" && $_POST['password']==""){
        echo "Please Enter Username and Password";
        die(mysql_error());
      }
  if($_POST['username']!="$admin" && $_POST['password']!="$adminpass" && isset($_POST['submit'])){
    
     header("Location:admin_login.php");
     echo "your have an error";
       
     }
 if($_POST['username']=="$admin" && $_POST['password']=="$adminpass"){
   echo "Username and Password matched";
}
else {
    echo "Username and Password didn't match";
}
 if($_POST['username']=="$admin" && $_POST['password']=="$adminpass" && isset($_POST['submit'])){

    $_SESSION['username']=$username;
    $_SESSION['admin_login_status']="loged in";
    admin_logintime($admin);
    online_user($admin);
    header("Location:admin_panel.php");
    
    
     }
    
   

?>