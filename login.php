<?php
session_start();
include("include/db_connect.php");
//include("core_php/admin_online.php");
$username=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT voter.email,voter.identity,voter.voted FROM voter WHERE(email='$username'and identity='$password') 
UNION  SELECT candidate.email,candidate.identity,candidate.voted FROM `candidate` WHERE(email='$username'and identity='$password')";
$query=mysql_query($sql);
$rows=mysql_fetch_array($query);

    $admin=$rows['email'];
    $adminpass=$rows['identity'];
    $voted=$rows['voted'];
      
  if($_POST['email']!="$admin" && $_POST['password']!="$adminpass" && "$voted"!='0' && isset($_POST['submit'])){
    
     header("Location:resindex.php");
     echo "your have an error";
       
     }
 if($_POST['email']=="$admin" && $_POST['password']=="$adminpass" && "$voted"=='0'){
   echo "Username and Password matched";
}
if($_POST['email']=="$admin" && $_POST['password']=="$adminpass" && "$voted"!='0'){
    echo "you have voted .you can't vote twice";
}
if($_POST['email']!="$admin" && $_POST['password']!="$adminpass" && "$voted"!='0'){
    echo "username and password didn't match";
}
if($_POST['email']=="$admin" && $_POST['password']=="$adminpass" && "$voted"!='0' && isset($_POST['submit'])){
    header("Location:resindex.php");
}
 if($_POST['email']=="$admin" && $_POST['password']=="$adminpass" && "$voted"=='0' && isset($_POST['submit'])){

    $_SESSION['username']=$username;
    $_SESSION['admin_login_status']="loged in";
   // admin_logintime($admin);
    //online_user($admin);
    header("Location:core_php/resvoting.php");
    
    
     }
    
   

?>