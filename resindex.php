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
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/bootstrap.theme.min.css" />
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="js/login.js"></script>
	
</head>

<body>
<?php
include("include/db_connect.php");
include("core_php/admin_online.php");

?>

 


<div  class="row">
<div class="col-xs-12" id="jumno-width">

<div class="container-fluid master"  id="banar">


<div class="container-fluid master text left" >
<table >
 <tr><td><div id="logo1"></div></td><td width=20></td><td><div id="logo"><h3>Online Voting System</h3></div></td></tr>
 </table>
</div><!--end of container1 -->


</div>  <!--end of jumbotron-->
</div>
</div>
<!--navbar-->
<div id="nav">
<nav class="navbar navbar-default  " role="navigation" id="menu">
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
<li> <button type="button" class="btn btn-link navbar-btn" id="btn" data-target="#modal-1" data-toggle="modal"> Sing up</button></li>


     
<li><a href="#">FAQ</a></li>

</ul>
</div>

</div>

</nav>
</div><!-- end of navbar-->
<div id="maincontainer" class="container-fluid master">
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
 <!--<form role="form" method="post"  >
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" required="required" />
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" name="password" required="required" />
  </div>
 
  <button type="submit" class="btn btn-default" name="login" id="login" >Login</button>
</form> -->
<form role="form" id="form" method="post" action="login.php" >
          <table class="table" >
            <tr><td><b>Username:</b></td><td><input type="email" name="email" id="email"   required="required" /></td><td><span id="showdialoge"></span></td></tr>
             <!--</a><tr><td></td><td></td><td><span id="showdialoge"></span></td></tr>-->
            <tr><td><b>Password:</b></td><td><input type="password" name="password" id="password"   required="required" /></td></tr>
             <tr ><td></td><td><input type="submit" id="button" name="submit"  value="Login"  /></td></tr>
   
   
          </table>
   <div id="error_msg">

</div>
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
<h3 class="modal-title">Registration form</h3>
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
<div>
<div class="col-xs-3" id="sidemenu">
 <div id="title">
 <?php
 $sql=mysql_query("select * from latest_article");
 while($row=mysql_fetch_array($sql)){
    $id=$row['id'];
    $title=$row['title'];
    ?>
    <div id="title_color">
    <?php
    echo "<table class='table' id='side_button'><tr><td>";
    echo "<a href='resindex.php?id=$id'> $title  </a></td></tr>";
    echo "</table>";
    ?>
    </div>
    <?php
    
    }
    
 
 
 
 ?>
 </div>
 <br /><br />
 
<div id="candidate_info">
<h5>Click here to show election candidates information .</h5><br />
</div>
<br />
<div id="candidate_information">
  <?php
 
       $sql=mysql_query("select distinct designation from candidate");
    $number=mysql_num_rows($sql);
   
    for($i=0;$i<$number;$i++){
      
                $row=mysql_fetch_array($sql);
                echo "<table class='table' style='background-color:white;'><tr><td>";
               
                  echo "<div id='desi'>$row[designation]</div>";
                echo "</td></tr></table>";
    
         $sql1=mysql_query("select *  from candidate where designation='$row[designation]'");
        
        while($row1=mysql_fetch_array($sql1)){
            $email=$row1['candidate_id'];
            echo "<table class='table' ><tr><td>";
           echo "<div id='candidate_name'><a href='resindex.php?email=$email'>$row1[name]</a></div>";
           echo "</td></tr></table>";
          }
          }
        ?>  
    
 
 
 
 

</div>
</div>
</div><!--end of sidemenu-->


<div class="col-xs-7" id="mainbody">
<div class="main">

<div class="row">
<div class="col-xs-12">

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
        echo "<table class='table' >";
                $row=mysql_fetch_array($sql);
                  echo "<tr><td style='background-color:gray; width:400px;'><center>$row[designation]</center></td>
                  <td style='background-color:gray; width:100px; '><center>vote</center></td></tr>";
                 
                 echo "<tr><td></td></tr>";echo "<tr><td></td></tr>";
                
                
         $sql1=mysql_query("select *  from result where designation='$row[designation]'");
        while($row1=mysql_fetch_array($sql1)){
            echo "<tr><td style='background-color; width:400px; border: 1px dotted maroon;'><center>$row1[name]</center></td>
            <td style='background-color:; width:100px;'>$row1[vote]</td></tr>";
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
        echo "<table class=table id=table1> <tr><td>";
        
    echo " Thank you . you are logged out without voting.";
    echo "</td></tr></table>";
    
 }
 }
 
 ?>
 <?php
 if(isset($_GET['con'])){
    if(session_destroy()){
        echo "<table class=table> <tr><td>";
        
    echo " Thank you . you have successfully completed your vote.";
    echo "</td></tr></table>";
 }
 }
 
 ?>
 
<?php
 
  if(isset($_GET['email'])){
     echo "<table class=table id=table> <tr><td>";
    echo "<h5>Here is your desired candidate's information.please have a look.</h5>";
     echo "</td></tr></table>";
    echo "<div id='candidate_informationn'>";
            $id=$_GET['email'];
            $sql=mysql_query("select * from candidate where candidate_id='$id'");
            while($row=mysql_fetch_array($sql)){
                 $pic=$row['candidate_photo'];
          $pic="<img src='image/candidate_image/$pic' style='width:100px; height:100px; margin-left:22px;' />";
           echo $pic."</br>";
                echo "Name: "."$row[name]"."</br>";
                echo " Father's Name: "."$row[fname]"."</br>";
                 echo "Mother's Name: "."$row[mname]"."</br>";
            }
            echo"</div>";
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
        echo "<table class=table id=table> <tr><td>";
        echo $row['title']."</br>";
        echo "</td></tr></table>";
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
         echo "<table class=table id=table> <tr><td>";
        echo $row['title']."</br>";
        echo "</td></tr></table>";
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

 </div><!--end maincontainer-->
 
</body>
</html>