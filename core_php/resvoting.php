<?php
session_start();
include("../include/db_connect.php");
include("admin_online.php");

if($_SESSION['username']=='' && $_SESSION['admin_login_status']!="loged in"){
    header('Location:../resindex.php');
}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>online voting</title>
	<meta http-equiv="content-type" content="text/html" />
	 <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  
<link rel="stylesheet" href="../css/resvoting.css" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap.theme.min.css" />
  <script src="../js/jquery-2.1.4.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
   <script src="../js/login.js"></script>
    <script src="../js/tst.js"></script>
	<title>Online Voting System</title>
</head>

<body>
<div  class="container_fluid master" id="banar">
<div class="col-sm-12" id="jumno-width">
<table>
 <tr><td><div id="logo1"></div></td><td width=20></td><td><div id="logo"><h3>Online Voting System</h3></div></td></tr>
 </table>
 </div>

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
<li ><a href="../resindex.php">Home</a></a></li>
  <li class="active"><?php echo "<a href='resvoting.php'>"?>Voting</a></li>
<li><a href="#">Gallary</a></li>

<li><button type="button" class="btn btn-link navbar-btn" id="btn" data-target="#modal-2" data-toggle="modal"> Registration form</button></li>

	<li><?php echo "<a href='../resindex.php?result=result'>"?>Result</a></li>
  
    <li ><?php echo "<a href='../resindex.php?logout=logout'>"?>Sign out</a></li>



     
<li><a href="#">FAQ</a></li>

</ul>
</div>

</div>

</nav>
</div><!-- end of navbar-->
<div id="maincontainer" class="container-fluid master">



<div class="row" id="main_row">
<div class="col-xs-12">
<div class="modal fade" id="modal-"  tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h3 class="modal-title">Login form</h3>
<div class="modal-body">
  <?php
 
  if(isset($_GET['id'])){
    echo "<h3>Here is your desired candidate's information.please have a look.</h3>";
    echo "<div id='candidate_information'>";
            $id=$_GET['id'];
            $sql=mysql_query("select * from candidate where candidate_id='$id'");
            while($row=mysql_fetch_array($sql)){
                 $pic=$row['candidate_photo'];
          $pic="<img src='../image/candidate_image/$pic' style='width:100px; height:100px; margin-left:22px;' />";
           echo $pic."</br>";
                echo "Name: "."$row[name]"."</br>";
                echo " Father's Name: "."$row[fname]"."</br>";
                 echo "Mother's Name: "."$row[mname]"."</br>";
            }
            echo"</div>";
          }
  
  ?>
  </div>
  <div class="modal-footer">
  <a href="rescount_vote.php" class="btn btn-primary" data-dismiss="modal">close</a>
   <a href="resvoting.php" class="btn btn-primary" data-dismiss="modal">Edit</a>
  
  </div>
</div>

</div>

  </div>
  </div>
  
  <?php
 
  if(isset($_GET['id'])){
    echo "<h3>Here is your desired candidate's information.please have a look.</h3>";
    echo "<div id='candidate_information'>";
            $id=$_GET['id'];
            $sql=mysql_query("select * from candidate where candidate_id='$id'");
            while($row=mysql_fetch_array($sql)){
                 $pic=$row['candidate_photo'];
          $pic="<img src='../image/candidate_image/$pic' style='width:100px; height:100px; margin-left:22px;' />";
           echo $pic."</br>";
                echo "Name: "."$row[name]"."</br>";
                echo " Father's Name: "."$row[fname]"."</br>";
                 echo "Mother's Name: "."$row[mname]"."</br>";
            }
            echo"</div>";
          }
  
  ?>

<?php

$sql=mysql_query("select * from event_schedule");
while($row=mysql_fetch_array($sql)){
$s=$row['start_time'];
$e=$row['end_time'];
if ((time()-strtotime($s))>=0 && (time()-strtotime($e))<=0 ){
 ?>
 <form action="rescount_vote.php" method="post" >
 <?php
 
       $sql=mysql_query("select distinct designation from candidate");
    $number=mysql_num_rows($sql);
    echo "<div id='instruction_voting'>The name of the candidate's and their symbol's are given below.Choose your 
    eligible candidate's from here.
    </div></br>";
    echo "<table class=table>";
    for($i=0;$i<$number;$i++){
      
                $row=mysql_fetch_array($sql);
                 echo "<tr><td style='border:1px solid maroon;margin-top:5px;'>";  
                  echo "<div id='desi'>$row[designation]</div></br>";
                
    
         $sql1=mysql_query("select *  from candidate where designation='$row[designation]'");
        
        while($row1=mysql_fetch_array($sql1)){
            
           $id=$row1['candidate_id'];
            //$designation=$row1['designation'];
             $pic=$row1['candidate_photo'];
          $pic="<img src='../image/candidate_image/$pic'  width='100px' height='100px;' />";
        ?>
        <table class="table"><tr><td>
       <?php echo "<a href='resvoting.php?id=$id'>$row1[name]</a>"; ?> 
         <?php echo "$pic"; ?>
        <input type="checkbox" name="check_list[]" value='<?php echo "$row1[candidate_id]";?>'   />
      </td><td > <a href='<?php echo "resvoting.php?id=$id" ?>' > <button type="button" class="btn btn-primary " id="btn" value="<?php echo "resvoting.php?id=$id" ?>"  data-target="#modal-1"  data-toggle="modal"> Show info</button></a></td>
       <td>  </td><td></td>
       
       </tr></table>
          
     
          <?php
          
    }
  
    
     echo "</td></tr>";
    }
    
     ?>
     
   </table>
    


 <center> <input  type="submit" id="submit" name="submit" value="submit" /></center>
  </form>
  
  
<?php
}
if((time()- strtotime($e))>0){
    session_destroy();
   header('Location:../resindex.php');


}

}
 

?>

</div>
</div><!--end of main row-->
</div><!--end maincontainer-->
</br>
<div class="row" id="footer">
<div class="col-sm-12" id="footer-text"><p>copywright @ ahatasham 2-16</p></div>
</div><!--end of foooter-->
</body>
</html>