<?php

function online_user($username){
    $sql=mysql_query("update admin set active='1' where username='$username'");
}
function voted_user($username){
    $sql=mysql_query("select email from voter where email='$username'");
        
    while($row=mysql_fetch_array($sql)){
        $email=$row['email'];
        }
        if("$email"=="$username"){
            $sql1=mysql_query("update voter set voted='1' where email='$username'");
            }else{
               $sql3=mysql_query("update candidate set voted='1' where email='$username'"); 
            }
        }
        
        
    

function ofline_user($username){
    $sql=mysql_query("update admin set active='0' where username='$username'");
}
function admin_logintime($username){
  date_default_timezone_get("Asia/Dhaka"); 
  $time=date("h:i:sa d.m.y");
 $sql=mysql_query("update admin set last_login='$time' where username='$username'");
}
function admin_logouttime($username){
  date_default_timezone_get("Asia/Dhaka"); 
  $time=date("h:i:sa d.m.y");
 $sql=mysql_query("update admin set last_logout='$time' where username='$username' ");
}
function send_email_to_voter($subject,$body){
    $sql=mysql_query("select * from voter");
    while($row=mysql_fetch_array($sql)){
        $to=$row['email'];
        $identity=$row['identity'];
         $c=mail($to,$subject,$body."($to)".'&&'."($identity)","From:demo@localhost");
            
        
    }
    if($c!=0){
        echo "successfull";
    }
    else{
        echo "error_occured";
    }
   
}
function send_email_to_candidate($subject,$body){
    $sql=mysql_query("select * from candidate");
    while($row=mysql_fetch_array($sql)){
        $to=$row['email'];
         $identity=$row['identity'];
         $c=mail($to,$subject,$body."($to)".'&&'."($identity)","From:demo@localhost");
            
        
    }
    if($c!=0){
        echo "successfull";
    }
    else{
        echo "error_occured";
    }
   
}
function send_email_to_all($subject,$body){
    send_email_to_voter($subject,$body);
    send_email_to_candidate($subject,$body);
    }
    function create_voter(){
        $file_name=null;
   
      $file_name=($_FILES['pic']['name']); 
     move_uploaded_file($_FILES["pic"]["tmp_name"],"../image/voter_image/$file_name");
     $designation=$_POST['designation'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $contact=$_POST['contact'];
     $voter_info=$_POST['information'];
     $pa=$_POST['text'];
     $bd=$_POST['datepicker'];
     $identity=md5(rand());
        $sql=mysql_query("insert into voter values ('','$name','$email','$designation','$voter_info','$pa','$bd','$file_name','$identity','')");
     if($sql!=0){
        echo "successfully inserted voter information";
     }
     else{
        echo "error_occured";
     }
    }
     function create_candidate(){
       
        
    $file_name=($_FILES['photo']['name']); 
     move_uploaded_file($_FILES["photo"]["tmp_name"],"../image/candidate_image/$file_name");
   
      $file_name1=($_FILES['symbol']['name']); 
     move_uploaded_file($_FILES["symbol"]["tmp_name"],"../image/candidate_image/candidate_symbol/$file_name1");
     $id=$_POST['id'];
     $designation=$_POST['designation'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $fname=$_POST['fname'];
     $mname=$_POST['mname'];
     $contact=$_POST['contact'];
    
    
     $identity=md5(rand());
      
        $sql=mysql_query("INSERT INTO `test`.`candidate` VALUES  ('$id','$designation','$file_name','$file_name1','$name','$email','$fname','$mname','$contact','$identity','','')"); 
        if($sql!=0){
           $sql1=mysql_query("DELETE FROM `test`.`candidate_application` WHERE `candidate_application`.`id` = $id");
           if($sql1!=0){
            echo "accepted successfully";
           }
           else{
            echo "error occured.";
           }
        }else{
            echo "failed.";
        }

    }
    
  function event_schedule(){
    $en=$_POST['event_name'];
    $st=$_POST['start_time'];
    $et=$_POST['end_time'];
    
 $sql=mysql_query("UPDATE `event_schedule` SET `event_id`='',`event_name`='$en',`start_time`='$st',`end_time`='$et' ");
 if($sql!=0){
    echo "time has been successfully set";
 }else
 echo "an error occured.please try again";
} 
function compare_time(){
   $sql=mysql_query("select * from candidate ");
    while($row=mysql_fetch_array($sql)){
        $to=$row['name'];
       
        
    }
}

function president($p){
    
    $sql=mysql_query("select * from candidate where designation='$p'");
    $num=mysql_num_rows($sql);
    $sufix=($num>1)?'s' : '';
    echo "Number of candidate$sufix :".$num."</br>";
    echo "<form method='post' action='count_vote.php'>";
    while($row=mysql_fetch_array($sql)){
        $name=$row['name'];
          $pic=$row['candidate_photo'];
          $pic="<img src='../image/candidate_image/$pic' width='100px' height='100px;' />";
          echo "<input type='checkbox' name=\"".$row['name']." />".$pic;
    }
    echo "<input type='submit' name='submit' value='submit'/>";
    echo "</form>";
    
}
function voter_identity($p){
    $sql=mysql_query("update voter set identity='' where (voter_name='$p')");
}
function designation(){
    ?>
   <form action="" method="post">
    <?php
    $sql=mysql_query("select distinct designation from candidate");
    $number=mysql_num_rows($sql);
    echo "$number</br>";
    ?>
     
    <?php
    for($i=0;$i<$number;$i++){
        echo "<table width='500'>";
                $row=mysql_fetch_array($sql);
                  echo "<tr><td><input type='hidden' name='designation[]' value='$row[designation]' /></td><td style='background-color:green; width:250px;'>$row[designation]</td></tr>";
                  ?>
                 
                  <?php
         $sql1=mysql_query("select *  from candidate where designation='$row[designation]'");
        while($row1=mysql_fetch_array($sql1)){
            echo "<tr><td><input type='hidden' name='name[]' value='$row1[name]'/></td><td >$row1[name]</td>
            <td><input type='hidden' name='vote[]' value='$row1[vote]'/></td><td>$row1[vote]</td></tr>";
        }
          
      }
     
      ?>
      </table>
      <input type="submit" name="publish" value="publish result"/>
      
      </form>
      
      <?php
      if(isset($_POST['publish'])){  
       $sql=mysql_query("select * from candidate");
       $num=mysql_num_rows($sql);
       if($num=='0'){
        echo "you have published result .";
        }        
        else{       
              

      for($a=0;$a<$num;$a++){
        $row=mysql_fetch_array($sql);
        $designation=$row['designation'];
        $name=$row['name'];
        $vote=$row['vote'];
        $sql13=mysql_query(" insert into result values('','$designation','$name','$vote')");
        
      }
      if($sql13!=0){
            $sql=mysql_query("update test set published='1'");
            if($sql!=0){
                $del=mysql_query("delete from candidate");
                if($del!=0){
                     $sql=mysql_query("update test set published='0'");
            
                     if($sql!=0){
                echo "result has successfully published";
            }else
            echo "failed";
        }
        
    
    
     }
       
       }
       }                     
       }
       }
       
       
     
  /*function login(){
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
    $_SESSION['username']=$username;
    $_SESSION['admin_login_status']="loged in";
    header("Location:core_php/voting.php");
   echo $_SESSION['username'];
  
    
}
else {
    echo "Your vote has been recorded .You can't vote twice";
}

    
  } 
       
      
      
      
*/


function candidate(){
    
    $file_name=($_FILES['pic']['name']); 
  $tmp_name=($_FILES['pic']['tmp_name']);
   $location="image/candidate_image/".$file_name;
 move_uploaded_file($tmp_name,$location);
      
    
     $designation=$_POST['designation'];
     $name=$_POST['name'];
     $fname=$_POST['fname'];
     $mname=$_POST['mname'];
     $email=$_POST['email'];
     $contact=$_POST['contact'];
     $pa=$_POST['text'];
     $bd=$_POST['datepicker'];
     $sex=$_POST['sex'];
        $sql=mysql_query("insert into candidate_application values ('','$file_name','$designation','$name','$fname','$mname','$email','$contact','$pa','$bd','$sex')");
        if($sql!=0){
            echo "your application is submitted successfully and pending for approval. you will be notified by email with in .....(symbol will be sent with your email)";
        }else{
            echo "you have an error.please check again and submit";
        }

    }
    
      function reject_candidate(){
       
        
   
     $id=$_POST['id'];
     
           $sql1=mysql_query("DELETE FROM `test`.`candidate_application` WHERE `candidate_application`.`id` = $id");
           if($sql1!=0){
            echo " rejected successfull";
           }
           else{
            echo "error occured.";
           }
       

    }



?>