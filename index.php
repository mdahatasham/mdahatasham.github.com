<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="css/index.css" />
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="css/jqueryCalendar.css"/>
<script src="js/jquery.datetimepicker.js"></script>
<script src="js/schedule.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>

	<title>Online Voting System</title>
</head>

<body>
<?php
include("include/db_connect.php");
include("core_php/admin_online.php");
?>

 <div id="header">
 <table>
 <tr><td><div id="logo"></div></td><td width=20></td><td><div id="site_name">Online Voting System</div></td></tr>
 </table>
 <table><tr><td width=80%></td><td>
 <form method="post" action="#" id="search_form"><input type="text" name="text"  id="search" placeholder="search here"/>
 <input type="submit" name="submit" value="Search" id="submit"/></form></td></tr></table>
 </div>
 <div id="menubar">
 <table><tr><td width="120"></td><td>
  <ul id="navmenu">
     <li><a href="index.php">Home</a></li>
	 <li><a href="#">Gallary</a> </li>
      <li><?php echo "<a href='index.php?form=form'>"?>Candidate ApplicationForm</a> </li>
	 <li><a href="#">Result</a>
	      <ul class="sub1">
		     <li><?php echo "<a href='index.php?result=result'>"?>Election Result</a></li>
			 <li><a href="#">Survey Result</a></li>
			 
		 </ul>
		  </li>
          <?php
          if(isset($_SESSION['username'])){
	 echo "<li><a href='index.php'?logout=logout>Logout</a></li>";
     }else{
         echo "<li><a href='index.php?log=log'>Login</a></li>";
     }
     ?>
      <li><a href="#">FAQ</a></li>
 
 
 
 </ul>
 </td></tr>
 </table>

 
	        
 
 
 </div>
 <div id="cover">
 <div id="profile">
 <div id="widget">
  
 <div id="sidemenu_area">
 <?php
 $sql=mysql_query("select * from latest_article");
 while($row=mysql_fetch_array($sql)){
    $id=$row['id'];
    $title=$row['title'];
    ?>
    <div id="title">
    <?php
    echo "<a href='index.php?id=$id'> $title  </a></br>";
    ?>
    </div>
    <?php
    
    }
 
 
 
 ?>
 </div>
 <div id="widget1">
 <?php
 
 echo "will be added soon";
 ?>
 </div>
 </div>

 </div>

 
 
 <div id="main">
 
 <?php
 if(isset($_GET['result'])){
  
    $sql=mysql_query("select distinct designation from result");
    $number=mysql_num_rows($sql);
   if($number=='0'){
    echo "Result is not published yet. It will published automatically when the time is right. Thank you.";
   }else{
    ?>
    <div id="result_speech">
     Here is the result . We can assure you that this result is 100% genuine. We are always ensure the accuracy and honesty.
    </div>
    <div id="result">
   
    <?php
     
    for($i=0;$i<$number;$i++){
        echo "<table width='500'>";
                $row=mysql_fetch_array($sql);
                  echo "<tr><td style='background-color:gray; width:500px;'><center>$row[designation]</center></td>
                  <td style='background-color:gray; width:100px; '>vote</td></tr>";
                 
                 echo "<tr><td></td></tr>";echo "<tr><td></td></tr>";echo "<tr><td></td></tr>";
                
                
         $sql1=mysql_query("select *  from result where designation='$row[designation]'");
        while($row1=mysql_fetch_array($sql1)){
            echo "<tr><td style='background-color:maroon; width:400px; border: 1px dotted maroon;'><center>$row1[name]</center></td>
            <td style='background-color:maroon; width:100px;'>$row1[vote]</td></tr>";
        }
        
          echo "</br>";  
      }
    
     ?>
     </div>
    
     </table>
     <?php
     
 }
 }
 else{
 
 ?>
 <?php
 if(isset($_GET['logout'])){
    if(session_destroy()){
    echo " Thank you . you are logged out without voting.";
 }
 }
 
 ?>
 <?php
 if(isset($_GET['con'])){
    if(session_destroy()){
    echo " Thank you . you have successfully completed your vote.";
 }
 }
 
 ?>
 <?php
if(isset($_GET['log'])){
  
?>

    <div id="confirmation">Enter your email and identity number for voting</div>
  <center>
   <form id="form" method="post" action="index.php?log=log" >
          <table >
            <tr><td><b>Email:</b></td><td><input type="email" name="email" id="email"  size="30px" required="required" /></td><td><span id="showdialoge"></span></td></tr>
            <tr><td><b>Password:</b></td><td><input type="password" name="password" id="password"  size="30px" required="required" /></td></tr>
             <tr ><td></td><td><input type="submit" id="button" name="login"  value="Login"  /></td></tr>
   
   
          </table>
   <div id="error_msg">

</div>
   </form>
  <div id="set">
<?php  echo "forgot your <a href='setting.php?mode=username'>Username?</a> or 
<a href='setting.php?mode=password'>password?</a>"  ?>
</div>
</center>

  
   


<?php
if(isset($_POST['login'])){

$username=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT voter.email,voter.identity,voter.voted FROM voter WHERE(email='$username'and identity='$password') 
UNION  SELECT candidate.email,candidate.identity,candidate.voted FROM `candidate` WHERE(email='$username'and identity='$password')";
$query=mysql_query($sql);
$rows=mysql_fetch_array($query);

    $admin=$rows['email'];
    $adminpass=$rows['identity'];
    $voted=$rows['voted'];
      if($_POST['email']=="" && $_POST['password']==""){
        echo "Please Enter Username and Password";
        die(mysql_error());
      }
  if($_POST['email']!="$admin" && $_POST['password']!="$adminpass" && $voted!="0" && ($_POST['login'])){
    
     header("Location:index.php?log=log");
     echo "your have an error";
       
     }
 if($_POST['email']=="$admin" && $_POST['password']=="$adminpass" && $voted=="0"){
   echo "You are eligible for voting.";
}
else {
    echo "Your vote has been recorded .You can't vote twice";
}
 if($_POST['email']=="$admin" && $_POST['password']=="$adminpass" && $voted=="0" && isset($_POST['login'])){

    $_SESSION['username']=$username;
    $_SESSION['admin_login_status']="loged in";
    header("Location:core_php/voting.php");
    
    
     }
    
   }
   }
   
   ?>
 
  
<div id="user_logform">
<div id="form">

<?php
if(isset($_GET['form'])){
    $sql=mysql_query("select * from event_schedule");
    $row=mysql_fetch_array($sql);
    $e=$row['ap_deadline'];
    if((time()- strtotime($e))<0){
   ?>
    <div id="create_voter">
    <h4>Enter candidate information</h4>
    </div></br>
   <?php
 $form=<<<FORM
 <center>
 <form method="post" action="index.php?form=form" enctype="multipart/form-data">
  <table> 
  <tr><td>Candidate's Photo</td><td><input type="file" name="pic" /></td></tr>            
     <tr><td>Designation</td><td><select name="designation">
                                  <option value="President" id="President">President</option>
                                  <option value="Vice_President" id="Vice_President">Vice_President</option>
                                  <option value="Secretary" id="Secretary">Secretary</option>
                                  <option value="General_Secretary" id="General_Secretary">General_Secretary</option>
                                  <option value="Member" id="Member">Member</option>
                                  </select></td></tr>
     <tr><td>Name</td><td><input type="text" name="name" id="name" /></td></tr>
      <tr><td>Father's Name</td><td><input type="text" name="fname" id="fname" /></td></tr>
       <tr><td>Mother's Name</td><td><input type="text" name="mname" id="mname" /></td></tr>
     <tr><td>Email</td><td><input type="text" name="email" id="email"/></td></tr>
     <tr><td>Contact</td><td><input type="text" name="contact" id="contact" /></td></tr>
	   <tr><td>Parmanent_Address</td><td><input type="text" name="text" id="text" /></td></tr>
       <tr><td>Date of_Birth</td><td><input type="text" name="datepicker" id="datetimepicker" /></td></tr>
     <tr><td>Sex</td><td><select name="sex">
                                  <option value="Male" id="Male">Male</option>
                                  <option value="Female" id="Female">Female</option>
                                  </select></td></tr>
     <tr><td></td><td><input type="submit" value="Submit" name="create" id="create" /></td></tr>
  </table>
</form>
</center>
FORM;
echo $form;



if(isset($_POST['create'])){
    candidate();
}
}
else
echo "Sorry ! Application deadline for registration is over.";
}

?>
 
 </div>



 </div>
 <div id="article">
 <?php


if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql=mysql_query("select * from latest_article where id='$id' ");
   while($row=mysql_fetch_array($sql)){
        ?>
        <div id="article_title">
        <?php
        echo $row['title']."</br>";
        ?>
        </div>
        <?php
         $pic=$row['picture'];
          $pic="<img src='image/article_pic/$pic' style='width:700px; height:220px; margin-left:22px;' />";
          
          if($row['picture']==0){
        
        //echo "<p>".substr($row['description'],0,400)."</p></br>";
         //echo "<p>".substr($row['description'],400,strlen($row['description']))."</p></br>";
          }else
          echo $pic."</br>";
          echo "<p>".substr($row['description'],0,400)."</p></br>";
           echo "<p>".substr($row['description'],400,600)."</p></br>";
         echo "<p>".substr($row['description'],600,strlen($row['description']))."</p></br>";
        
        }
         
    }
  

else{
    $sql=mysql_query("select * from latest_article limit 2 ");
    while($row=mysql_fetch_array($sql)){
        ?>
        <div id="article_title">
        <?php
        echo $row['title']."</br>";
        ?>
        </div>
        <?php
       ?>
        <div id="article_description">
        <?php
        echo "<p>".substr($row['description'],0,400)."</p></br>";
         echo "<p>".substr($row['description'],400,strlen($row['description']))."</p></br>";
        ?>
         </div>
         <?php
    }
}
}


?>

</div>
</div>
</div>
<div id="footer"><center>Copyright @ 2015 .all right reserved by @@@@</center></div>
</body>
</html>