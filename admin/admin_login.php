<!--<!DOCTYPE HTML>
<html>
<head>
	<script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/admin_login.js"></script>
    <link rel="stylesheet"  href="css/admin_login.css"/>
	<title>Untitled 1</title>
</head>

<body>

<div id="main">

<form action="admin_login_process.php" method="post" id="form">
<table id="table">
<tr><td> </td><td><h3>Admin Login:</h3></td></tr>
<tr><td>Username:</td><td><input type="text" id="user" required="required" /></td></tr><br />
<tr><td></td><td></td><td><span id="show_dialog"></span></td></tr>
<tr><td>Password:</td><td><input type="password" id="pass" required="required" /></td></tr>
<tr><td> </td><td><input type="submit" id="submit" name="submit" value="Log in"  /></td></tr>


</table>
</form>
<div id="set">
<?php  /*echo "forgot your <a href='setting.php?mode=username'>Username?</a> or 
<a href='setting.php?mode=password'>password?</a>"  */?>
</div>
</div>
</body>
</html>
-->
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="../css/admin_login.css" />

	<script src="../js/jquery-2.1.4.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="../js/admin_login.js"></script>
	<title>admin login</title>
    
</head>

<body>
 <div id="wrapper">
   <div id="baner">
    <h2>Admin Panel</h2>
   </div>
   <form id="form" method="post" action="admin_login_process.php" >
          <table >
            <tr><td><b>Username:</b></td><td><input type="text" name="username" id="username"  size="30px" required="required" /></td><td><span id="showdialoge"></span></td></tr>
             <!--</a><tr><td></td><td></td><td><span id="showdialoge"></span></td></tr>-->
            <tr><td><b>Password:</b></td><td><input type="password" name="password" id="password"  size="30px" required="required" /></td></tr>
             <tr ><td></td><td><input type="submit" id="button" name="submit"  value="Login"  /></td></tr>
   
   
          </table>
   <div id="error_msg">

</div>
   </form>
  <div id="set">
<?php  echo "forgot your <a href='setting.php?mode=username'>Username?</a> or 
<a href='setting.php?mode=password'>password?</a>"  ?>
</div>
</div>



</body>
</html>