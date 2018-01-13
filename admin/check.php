<?php 
session_start();
include ('../config.php');
$session_aid=$input->session('aid');
//var_dump($session_aid);
if ($session_aid===false) {
	//header("location:login.php");
}
$sql="select * from admin where aid='{$session_aid}'";
$mysqli_result=$db->query($sql);
//$rel=$mysqli_result->fetch_array(MYSQLI_ASSOC);
$auserq=$mysqli_result->fetch_array(MYSQLI_ASSOC);
//var_dump($auser);
 ?>