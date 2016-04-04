<?php
include("../include/db_connect.php");
function online(){
$sql=mysql_query("select * from admin where active='1'");
if($row=mysql_num_rows($sql)){
echo "admin online($row)";
}else{
    echo "admin online ($row)";
}
}

?>