<?php
define("PATH", dirname(__FILE__));
include (PATH.'/core/input.class.php');
$input=new input();
include (PATH.'/core/db.class.php');
$db=new db();
//include (PATH.'/header.inc.php');
//读取系统设置配置文件
$sql="select * from setting ";
$mysqli_result=$db->query($sql);
$setting=array();
while ($row=$mysqli_result->fetch_array(MYSQLI_ASSOC)) {
	$setting[$row['key']]=$row['val'];
}
?>