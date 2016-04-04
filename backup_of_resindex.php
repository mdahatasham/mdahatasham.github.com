<?php
session_start();
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
<title>online voting</title>
	<meta http-equiv="content-type" content="text/html" />
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <link rel="stylesheet" href="css/resindex.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap.theme.min.css" />
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="js/vote.js"></script>
	
</head>

<body>
<?php
include("include/db_connect.php");
include("core_php/admin_online.php");

?>

 
<div class="row" id="maincontainer">
<div class="col-xs-12" id="con">
<div  class="row">
<div class="jumbotron"  id="banar">
<div class="col-xs-12" id="jumno-width">
<div class="btn-group">
<a href="#" class="btn btn-md btn-success">working</a>
</div><!--end btn-group-->
<div class="container-fluid text left">
<h3>online voting</h3>
</div><!--end of container1 -->

<?php
          if(isset($_SESSION['username'])){
	 echo "<li><a href='index.php'>Logout</a></li>";
     }else{
         echo "<li><a href='index.php?log=log'>Login</a></li>";
     }
     ?>
     </div>
</div>  <!--end of jumbotron-->
</div>
<!--navbar-->
<div id="nav">
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
<span class="sr-only">toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div class="collapse navbar-collapse" id="example-nav-collapse">
<ul class="nav navbar-nav navbar-left" id="menu">
<li class="active"><a href="resindex.php">Home</a></a></li>
<li><a href="#">Gallary</a></li>

<li><button type="button" class="btn btn-link navbar-btn" id="btn" data-target="#modal-2" data-toggle="modal"> Registration form</button></li>

	<li><?php echo "<a href='resindex.php?result=result'>"?>Result</a></li>
<li><button type="button" class="btn btn-link navbar-btn" id="btn" data-target="#modal-1" data-toggle="modal"> Sign up</button></li>


     
<li><a href="#">FAQ</a></li>

</ul>
</div>

</div>

</nav>
</div><!-- end of navbar-->
<?php
$sql=mysql_query("select * from event_schedule");
while($row=mysql_fetch_array($sql)){
$s=$row['start_time'];
$e=$row['end_time'];
if ((time()-strtotime($s))>=0 && (time()-strtotime($e))<=0 ){
?>

<div class="modal fade" id="modal-1" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h3 class="modal-title">Login form</h3>
 <form role="form" method="post" >
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" required="required" />
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="required" />
  </div>
 
  <button type="submit" class="btn btn-default" name="login" id="login">Login</button>
</form>
</div>

</div>

  </div>
  </div>
  
  <?php
  
  } 
  else{
  ?>
  <div class="modal fade" id="modal-1" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h3 class="modal-title">time is up</h3>
 
</div>

</div>

  </div>
  </div>
  <?php
  }
  }
  ?>
  <?php
$sql=mysql_query("select * from event_schedule");
    $row=mysql_fetch_array($sql);
    $e=$row['ap_deadline'];
    if((time()- strtotime($e))<0){
?>
  <div class="modal fade" id="modal-2" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h3 class="modal-title">Login form</h3>
 <center>
 <form method="post" action="resindex.php?form=form" enctype="multipart/form-data">
  <table class="table" > 
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
     <tr><td>Email</td><td><input type="email" name="email" id="email" required="required"/></td></tr>
     <tr><td>Contact</td><td><input type="text" name="contact" id="contact" /></td></tr>
	   <tr><td>Parmanent_Address</td><td><input type="text" name="text" id="text" /></td></tr>
       <tr><td>Date of_Birth</td><td><input type="text" name="datepicker" id="datetimepicker"  required="required"/></td></tr>
     <tr><td>Sex</td><td><select name="sex">
                                  <option value="Male" id="Male">Male</option>
                                  <option value="Female" id="Female">Female</option>
                                  </select></td></tr>
     <tr><td></td><td><input type="submit" value="Submit" name="create" id="create" /></td></tr>
  </table>
</form>
</center>
</div>

</div>

  </div>
  </div>
  <?php
  }
  else {
  ?>
  <div class="modal fade" id="modal-2" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h3 class="modal-title">time is up</h3>
 
</div>

</div>

  </div>
  </div>
  <?php
  }
  
  ?>
  
<div class="container1">
<div class="row">
<div class="col-xs-1" id="left-margin">
<div class="row">
<div class="col-xs-12" id="left-col" >

</div>
</div>
</div><!--end of left-margin-->
<div class="col-xs-3" id="sidemenu">
 <?php
 $sql=mysql_query("select * from latest_article");
 while($row=mysql_fetch_array($sql)){
    $id=$row['id'];
    $title=$row['title'];
    ?>
    <div id="title">
    <?php
    echo "<a href='resindex.php?id=$id'> $title  </a></br>";
    ?>
    </div>
    <?php
    
    }
 
 
 
 ?>


</div><!--end of sidemenu-->


<div class="col-xs-7" id="mainbody">
<div class="main">

<div class="row">
<div class="col-xs-12">
<?php
if(isset($_POST['email'])&& isset($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    
  $sql="SELECT voter.email,voter.identity,voter.voted FROM voter WHERE(email='$email'and identity='$password') 
UNION  SELECT candidate.email,candidate.identity,candidate.voted FROM `candidate` WHERE(email='$email'and identity='$password')";
$query=mysql_query($sql);
$rows=mysql_fetch_array($query); 
$email=$rows['email'];
    $password=$rows['identity'];
          $voted=$rows['voted'];
      if($_POST['email']=="" && $_POST['password']==""){
        echo "Please Enter Username and Password";
        die(mysql_error());
      }
  
     if($_POST['email']!="$email" && $_POST['password']!="$password" && $voted!="0" ){
    
     header('Location:resindex.php');
     echo "your have an error";
       
     }
 if($_POST['email']=="$email" && $_POST['password']=="$password" && $voted=="0" ){
   $_SESSION['username']=$email;
    $_SESSION['admin_login_status']="loged in";
    header('Location:core_php/resvoting.php');
}
else {
    echo "Your vote has been recorded .You can't vote twice";
}
 
    
   
 
}
?>

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

 
  
<div id="user_logform">
<div id="form">


<?php
if(isset($_GET['form'])){
    $sql=mysql_query("select * from event_schedule");
    $row=mysql_fetch_array($sql);
    $e=$row['ap_deadline'];
    if((time()- strtotime($e))<0){
   
    



    candidate();

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
          $pic="<img src='image/article_pic/$pic' class='img-responsive'  style='width:700px; height:220px; margin-left:0px;' />";
          //<img src="cinqueterre.jpg" class="img-responsive" alt="Cinque Terre" width="304" height="236"> 
          
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


</div><!--end of row main -->
</div><!--end of main-->

</div>
<div class="col-xs-1" id="right-margin">
<div class="row">
<div class="col-xs-12" id="right-col">
</div>
</div>
</div><!--end of right-margin-->
</div><!--end of row -->
</div><!--end container1-->
<div class="row" id="footer">
<div class="col-sm-12" id="footer-text"><p>copywright @ ahatasham 2-16</p></div>
</div><!--end of foooter-->
</div>
 </div><!--end maincontainer-->
 
</body>
</html>