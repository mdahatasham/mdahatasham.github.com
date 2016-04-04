<?php
session_start();
if($_SESSION['username']==0 && $_SESSION['admin_login_status']!="loged in"){
    header('Location:admin_login.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="../css/admin_panel.css" />
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/admin_panel.js"></script>
	<title>Online Voting System</title>
</head>

<body>
<?php
	include("../include/db_connect.php");
   include("../core_php/admin_online.php");
   include("../core_php/widget/online.php");
?>
 <div id="header">
 <table>
 <tr><td><div id="logo1"></div></td><td width=20></td><td><div id="logo"><h2>Online Voting System</h2></div></td></tr>
 </table>
 </div>
 <div id="menubar">
 
 <div id="name"><h4>Administrator</h4></div>
 <div id="logout"><a href="logout.php"><h4>logout</h4></a></div>
 
 
 </div>
 
 <div id="profile">
 <div id="widget">
 <div id="online">
 <?php
 online();
 ?>
 </div>
 </div>
 <div id="ci">
 <?php
 $sql=mysql_query("select * from candidate_application");
 $num=mysql_num_rows($sql);
 echo "<a href='create_election_templete.php?cc=cc'>Candidate application for granted: $num</a>";
 
 ?>
 
 
 </div>
 
 </div>

 
 
 <div id="main">
 <h3>Choose an action..</h3>
 <div id="work">
 <table>
  <tr style="height: 100px;"><td><div id="img"></div></td><td><div id="heading"><?php echo "<a href='create_election_templete.php?cv=cv'>Create Election Templete </a>" ?></div></td>
  <td></td><td width=80></td><td><div id="img"></div></td><td><div id="heading"><a href="create_election_templete.php?sv=sv">Create Survey Templete</a></div></td></td></tr><br />
 <tr><td><div id="img"></div></td><td><div id="heading"><a href="create_election_templete.php?cm=cm"><div id="cm">Content Management </div></a></div></td><td></td><td width=80></td><td><div id="img"></div></td>
 <td><div id="heading1"><a href="create_survey_templete.php">Configuration</a> </div></td></tr>
 <tr><td><div id="img"></div></td><td><div id="heading"><a href="create_election_templete.php">Tools</a></div></td></tr>
 </table>
 </div>
 </div>
 



</body>
</html>