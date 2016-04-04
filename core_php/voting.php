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
<link rel="stylesheet" href="../css/voting.css" />
<script src="../js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="../css/jqueryCalendar.css"/>
<script src="../js/jquery.datetimepicker.js"></script>
<script src="../js/schedule.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>

	<title>Online Voting System</title>
</head>

<body>

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
		     <li><a href="#">Election Result</a></li>
			 <li><a href="#">Survey Result</a></li>
			 
		 </ul>
		  </li>
          <?php
          if(isset($_SESSION['username'])){
	 echo "<li><a href='../resindex.php?logout=logout'>Logout</a></li>";
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
    echo "<a href='voting.php?id=$id'> $title  </a></br>";
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
 <div id="content">

 
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
if(isset($_GET['back'])){
    ?>
    <div id='alert'>
    <?php
    echo "you havn't choose any candidate. you have to vote .please submit your valuable vote.";
    ?>
    </div>
    <?php
}

/*if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql=mysql_query("select * from latest_article where id='$id'");
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
          
          if(empty($pic)){
        
          echo $row['description']."</br>";
          }else
          echo $pic."</br>";
        echo $row['description']."</br>";
        }
    }
*/



?>
 <?php

$sql=mysql_query("select * from event_schedule");
while($row=mysql_fetch_array($sql)){
$s=$row['start_time'];
$e=$row['end_time'];
if ((time()-strtotime($s))>=0 && (time()-strtotime($e))<=0 ){
 ?>
 <form action="count_vote.php" method="post" >
 <?php
 
       $sql=mysql_query("select distinct designation from candidate");
    $number=mysql_num_rows($sql);
    echo "<div id='instruction_voting'>The name of the candidate's and their symbol's are given below.Choose your 
    eligible candidate's from here.
    </div></br>";
    echo "<table>";
    for($i=0;$i<$number;$i++){
      
                $row=mysql_fetch_array($sql);
                 echo "<tr><td style='border:1px solid maroon;margin-top:5px;'>";  
                  echo "<div id='desi'>$row[designation]</div></br>";
                
    
         $sql1=mysql_query("select *  from candidate where designation='$row[designation]'");
        
        while($row1=mysql_fetch_array($sql1)){
            
           $id=$row1['candidate_id'];
            //$designation=$row1['designation'];
             $pic=$row1['candidate_photo'];
          $pic="<img src='../image/candidate_image/$pic' width='100px' height='100px;' />";
        ?>
        <input type="checkbox" name="check_list[]" value='<?php echo "$row1[candidate_id]";?>'   />
         <?php echo "$pic"; ?>
       
       
          
        <?php echo "<a href='voting.php?id=$id'>$row1[name]</a>"; ?> 
          <?php
          
    }
  
    
     echo "</td></tr>";
    }
    
     ?>
     
   </table>
    


  <input  type="submit" name="submit" value="submit"/>
  </form>
  
  
<?php
}
if((time()- strtotime($e))>0){
    session_destroy();
   header('Location:../index.php');


}

}

?>
</div>

 </div>
  </div>
<div id="footer"><center>Copyright @ 2015 .all right reserved by @@@@</center></div>



</body>
</html>