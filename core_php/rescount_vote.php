<?php
session_start();
include('../include/db_connect.php');
include('admin_online.php');
if($_SESSION['username']=='' && $_SESSION['admin_login_status']!="loged in"){
    header('Location:../resindex.php');
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />

	<title>Untitled 3</title>
</head>

<body>
<?php 

if (isset($_POST['submit'])) 
{
   
    
  $i=1;  
  foreach($_POST["check_list"] as $name){
    if($name==0){
         header('Location:resvoting.php?back=back');
    }
    else{
   
  $sql1=mysql_query("select * from candidate where candidate_id='".$name."'");
$row=mysql_fetch_array($sql1);
if($row!=0){

$v="$row[vote]"+"$i"."</br>"; 
 $sql=mysql_query("update candidate set vote='$row[vote]'+'$i' where( candidate_id='".$name."' )");
if($sql!=0){
  voted_user($_SESSION['username']);
   
    header('Location:../resindex.php?con=con');
   
}
else{
    echo "not done yet";
}


 }else{
    header('Location:resvoting.php');
 }


 
  }
  }
   header('Location:../resindex.php?con=con');
  
 }
  
  

?>





</body>
</html>