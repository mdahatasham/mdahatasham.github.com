<?php
session_start();
if($_SESSION['username']==0 && $_SESSION['admin_login_status']!="loged in"){
    header('Location:admin_login.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="../css/templete.css" />
<link rel="stylesheet" type="text/css" href="../css/jquery.datetimepicker.css"/>
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery.datetimepicker.js"></script>
<script src="../js/schedule.js"></script>
<script src="../js/templete.js"></script>
<script src="../js/servey.js"></script>
<link rel="stylesheet" href="../css/jqueryCalendar.css"/>
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
 <div id="main_menu"><a href="admin_panel.php"><h4>Go To Main Menu</h4></a></div>
 <div id="logout"><a href="logout.php"><h4>logout</h4></a></div>
 
 </div>

 <div id="profile">
 <div id="sidemenu">
 <div id="widget">
 <?php
 online();
 ?>
 </div>
 <div id="sidemenu_content">
 <?php
 if(isset($_GET['cv']) || isset($_GET['ap']) || isset($_GET['cc']) || isset($_GET['ct']) || isset($_GET['se']) || isset($_GET['pr'])|| isset($_GET['id'])){
    ?>
 <div id="image">
 <div id="create_election">
 <h4>Create Election</h4>
  </div>
  <div id="show_content">
  <table>
  <tr><td><?php echo "<a href='create_election_templete.php?cv=cv'>Create voter </a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?ap=ap'>Create application deadline</a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?cc=cc'>Create candidate </a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?ct=ct'>Create set event schedule</a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?se=se'>send email</a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?pr=pr'>publish result</a>" ?></td></tr>
  
  </div>
 </table>

 </div>
 
 <?php
 }
 ?>
  <?php
 if(isset($_GET['sv'])){
    ?>
 <div id="image">
 <div id="Create_Survey">
 <h4>Create_Survey</h4>
  </div>
  <div id="show_content">
  <table>
  <tr><td><?php echo "<a href='create_election_templete.php?cv=cv'>Create voter </a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?ap=ap'>Create application deadline</a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?cc=cc'>Create candidate </a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?ct=ct'>Create set event schedule</a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?se=se'>send email</a>" ?></td></tr>
  <tr><td><?php echo "<a href='create_election_templete.php?pr=pr'>publish result</a>" ?></td></tr>
  
  </div>
 </table>

 </div>
 <?php
 }
 ?>
 
  <div id="configuration">
 <h4>configuration</h4>
  </div>
  <div id="show_content2">
  <table>
  <tr><td><a href="create_election_templete">set question</a></td></tr>
  <tr><td><a href="create_election_templete">set event schedule</a></td></tr>
  <tr><td><a href="create_election_templete">publish result</a></td></tr>
   </table>
  </div>
   <div id="Tool">
 <h4>Tools</h4>
  </div>
  <div id="show_content3">
  <table>
  <tr><td><a href="create_election_templete">set question</a></td></tr>
  <tr><td><a href="create_election_templete">set event schedule</a></td></tr>
  <tr><td><a href="create_election_templete">publish result</a></td></tr>
   </table>
  </div>
  
  

</div>
 </div>
 </div>
</div>
 
 
 <div id="main">
 <div id="form">
 <?php
   if(isset($_GET['id'])){
    echo "<h3>Here is your desired candidate's information.please have a look.</h3>";
    echo "<div id='candidate_information'>";
            $id=$_GET['id'];
            $sql=mysql_query("select * from candidate_application where id='$id'");
            while($row=mysql_fetch_array($sql)){
                 $pic=$row['candidate_photo'];
          $pic="<img src='../image/candidate_image/$pic' style='width:100px; height:100px; margin-left:22px;' />";
           echo $pic."</br>";
                echo "Name: "."$row[name]"."</br>";
                echo " Father's Name: "."$row[fname]"."</br>";
                 echo "Mother's Name: "."$row[mname]"."</br>";
            }
            echo"</div>";
            echo "<a href='create_election_templete.php?cc=cc'>back</a>";
          }
          
   ?>
<?php
if(isset($_GET['cv'])){
   ?>
    <div id="create_voter">
    Enter voter information
    </div></br>
    <div id="cv">
  
    <?php
   
 $form=<<<FORM
 <center>
 <form method="post" action="" enctype="multipart/form-data" id="voter_form">
  <table >    
  <tr><td>Voter's Photo</td><td><input style="width:250px; height:25px;" type="file" name="pic" id="pic" /></td></tr>         
     <tr><td>Designation</td><td><input style="width:250px; height:25px;" type="text" name="designation" id="designation"  /></td></tr>
     <tr><td>Name</td><td><input style="width:250px; height:25px; margin-left:-0px;"  type="text" name="name" id="name" /></td></tr>
     <tr><td>Email</td><td><input style="width:250px; height:25px;" type="text" name="email" id="email"/></td></tr>
     <tr><td>Contact</td><td><input style="width:250px; height:25px;" type="text" name="contact" id="contact" /></td></tr>
	 <tr><td>About_Voter</td><td><textarea name="information" id="information" rows="10" cols="40"></textarea></td></tr>
	   <tr><td>Parmanent_Address</td><td><input style="width:250px; height:25px;" type="text" name="text" id="text" /></td></tr>
       <tr><td>Date of_Birth</td><td><input style="width:250px; height:25px;" type="text" name="datepicker" id="datetimepicker" /></td></tr>
     <tr><td></td><td><input style="width:250px; height:25px;" type="submit" value="Save" name="save"  /></td></tr>
  </table>
</form>
</center>
FORM;
echo $form;
if(isset($_POST['save'])){
   create_voter();
     
}
?>
</div>
<?php
}

?>
 
   
 <div id="cinfo">  
  
<?php
if(isset($_GET['cc'])){
    
   ?>
    <div id="create_voter">
    <h4>Enter candidate information</h4>
    </div></br>
   
   
  
   <?php
 $sql=mysql_query("select distinct designation from candidate_application");
    $number=mysql_num_rows($sql);
    //echo "$number</br>";
    
    for($i=0;$i<$number;$i++){
                $row=mysql_fetch_array($sql);
                  echo "$row[designation]::</br>";
                   
    echo "<form action='' id='cf' method='post' enctype='multipart/form-data'>";
    echo "<table>";
         $sql1=mysql_query("select *  from candidate_application where designation='$row[designation]'");
        while($row1=mysql_fetch_array($sql1)){
            $id=$row1['id'];
            $designation=$row1['designation'];
             $pic=$row1['candidate_photo'];
          $pic="<img src='../image/candidate_image/$pic' width='100px' height='100px;' />";
            ?>
            <tr><input type="hidden" name="id" value='<?php echo "$id" ;?>'/><input type="hidden" name="designation" value='<?php echo "$designation" ;?>'/><td><?php echo "$pic" ;?></td><td><input type="file"  name="photo"/></td><td><?php echo "<a href='create_election_templete.php?id=$id'>$row1[name]</a>";?></td><td><input type="hidden" name="name" value='<?php echo "$row1[name]";?>'/></td><input type="hidden" name="fname" value='<?php echo "$row1[fname]";?>'/>
            <input type="hidden" name="mname" value='<?php echo "$row1[mname]";?>'/><input type="hidden" name="contact" value='<?php echo "$row1[contact]";?>'/><td><input type="file" name="symbol"/></td></tr>
            <td><input type="hidden" name="email" value='<?php echo "$row1[email]";?>'/></td><tr>
            <td><input type="submit" name="accept" value="accept" /></td>
            <td><input type="submit" name="reject" value="Reject" /></td></tr>
           
            <?php
          
        }
        ?>
          </table></form>
          <?php
        
      }
      
        ?>
       
        
    
        




 
  <?php
if(isset($_POST['accept'])){
   
            
    create_candidate();
}
if(isset($_POST['reject'])){
    reject_candidate();
}
}
?>
</div>
<?php

if(isset($_GET['ct'])){
   ?>
    <div id="create_voter">
    <h4>Enter Evesnt Time</h4>
    </div>
    <div id="ct">
   <?php
 $form=<<<FORM
 <center>
 <form method="post" action="" id="time">
  <table > 
        
    <tr><td>Event Name:</td><td><input style="width:250px; height:25px;" type="text" name=event_name id="event_name" required="required" /></td></tr>
     <tr><td>Start Time:</td><td><input style="width:250px; height:25px;" type="text" name=start_time id="datetimepicker" required="required" /></td></tr>
     <tr><td>End Time:</td><td><input style="width:250px; height:25px;" type="text" name="end_time" id="datetimepicker1" required="required" /></td></tr>
     
     <tr><td></td><td><center><input  style="width:130px; height:25px; align:center;" type="submit" value="Update Schedule" name="update_schedule" id="update_schedule"  /></center></td></tr>
  </table>
</form>

FORM;
echo $form;
?>
<div id="cta">
<?php
if(isset($_POST['update_schedule'])){
    event_schedule();
}

?>
</div>
</center>
</div>
<?php
}

if(isset($_GET['se'])){
$form=<<<FORM
 <center>
 <form method="post" action="" enctype="multipart/form-data">
  <table >       
     <tr><td>To</td><td><select name="designation" id="designation"  >
                                  <option value="voter" id="voter">Only_Voters</option>
                                  <option value="candidate" id="candidate">Only_Candidates</option>
                                  <option value="all" name="all" id="all">All</option>
                                  </select></td></tr>
     <tr><td>Subject</td><td><input type="text" name="subject" id="subject"  size="51"/></td></tr>
     <tr><td>Body Text</td><td><textarea name="body" id="body" rows="10" cols="40"></textarea></td></tr>
     <tr><td></td><td><input type="submit" value="Send Email" name="submit" id="submit" /></td></tr>
  </table>
</form>
</center>
FORM;
echo $form;

if(isset($_POST['submit'])){
    $to=$_POST['designation'];
    $subject=$_POST['subject'];
    $body=$_POST['body'];
    if($_POST['designation']=="voter"){
        send_email_to_voter($subject,$body);
    }
    if($_POST['designation']=="candidate"){
        send_email_to_candidate($subject,$body);
    }
     if($_POST['designation']=="all"){
        send_email_to_all($subject,$body);
    }
}
}
?>
<?php
if(isset($_GET['pr'])){
   //designation();
   $sql=mysql_query("select * from event_schedule");
$row=mysql_fetch_array($sql);
$e=$row['end_time'];
echo $e."</br>";
$sql1=mysql_query("select * from test");
$row1=mysql_fetch_array($sql1);
$publish=$row1['published'];
echo "$publish";
   if((time()- strtotime($e))<0 && "$publish"=='0'){
    echo "voting is going on...";
   }
  if((time()- strtotime($e))>0 && "$publish"=='0'){
  
    designation();
   }
   if((time()- strtotime($e))>0 && "$publish"=='1'){
   echo "you have published the result once . you can't publish the result twice.";
   }
   
}



?>
<?php
if(isset($_GET['sv'])){
    ?>
    <form id="form" method="post" action="#" >
         
     <p>Body Text<textarea name="body" id="body" rows="7" cols="51"></textarea></p>
     <p><input type="text" name="file_1"   size="49"/></p>
     <p>
     <input type="submit" value="submit" name="submit" id="submit" />
     <a id="add_more" href="#">add_more</a>
     </p>
  
</form>
    <?php
    
    }
    ?>
  <?php
  if(isset($_GET['ap'])){
    ?>
    <table style="width: 500px;">
    <form action="" method="post">
    <tr><td style="width: 30px; height: 10px;">Enter App_deadline:<input style="width: 200px; height: 30px;" type="text" name="time" id="datetimepicker1" required="required" /></td></tr>
    <tr><td ><input style="width: 120px; height: 25px;margin-left: 170px;" type="submit" name="submit" value="set"/></td></tr>
    </form>
    </table>
    <?php
    if(isset($_POST['submit'])){
        $ap_deadline=$_POST['time'];
        $sql=mysql_query("update event_schedule set ap_deadline='$ap_deadline'");
        if($sql!=0){
            echo "successfully done";
        }else
        echo "failed";
    }
  }
  
  
  ?> 
  <?php
  if(isset($_GET['cm'])){
    ?>
    <table style="width: 500px;">
    <form action="" method="post" enctype="multipart/form-data">
    <tr><td style="width: 30px; height: 10px;">Enter Title:<input style="width: 200px; height: 30px;" type="text" name="title"  /></td></tr>
        <tr><td style="width: 30px; height: 10px;">Add Picture:<input style="width: 200px; height: 30px;" type="file" name="article_pic"  /></td></tr>
    <tr><td>Enter Description:<textarea  name="description" rows="10" cols="50" ></textarea></td></tr>
    <tr><td ><input style="width: 120px; height: 25px;margin-left: 170px;" type="submit" name="submit" value="submit"/></td></tr>
    </form>
    </table>
    <?php
    if(isset($_POST['submit'])){
        $file_name=($_FILES['article_pic']['name']); 
     move_uploaded_file($_FILES["article_pic"]["tmp_name"],"../image/article_pic/$file_name");
        $title=$_POST['title'];
        $description=$_POST['description'];
        $sql=mysql_query("insert into latest_article values('','$title','$file_name','$description')");
        if($sql!=0){
            echo "successfully done";
        }else
        echo "Oops! error occured. please try again.";
    }
    
  }
  
  
  ?>
 

</div>
 </div>
 



</body>
</html>