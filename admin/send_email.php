<?php
session_start();

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="../css/templete.css" />
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/templete.js"></script>
	<title>Online Voting System</title>
</head>

<body>
<?php
	include("../include/db_connect.php");
   include("../core_php/admin_online.php");
   include("../core_php/widget/online.php");
   if(mail("masud@localhost.com", "subject","dbody.","From:demo@localhost"))
   {
    echo "sending failed";
   }
  
   
?>

