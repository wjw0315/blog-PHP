<?php

	//数据库的连接
	$mysqli=new mysqli("localhost","root","","blog");
	if($mysqli->connect_errno >0){
		echo "连接错误";
		echo $mysqli->connect_errno;
		exit;
	}
//防止出现乱码
$mysqli->query("SET NAMES UTF8");


?>
$dir='../upfiles/';
if (isset($file)) {
	$pathname=$dir.$file['name'];
	$urlname='localhost:88/upfiles/'.$file['name'];
    $is=move_uploaded_file($file['tmp_name'], $pathname);

}