<?php
include('./check.php');
$key='upload_file';
//$file=array();
//var_dump($_FILES[$key]);
$dir='../upfiles/';
if (isset($_FILES[$key])) {
	//$flie=$_FILES[$key];
	//var_dump($file);
    //var_dump($_FILES[$key]);
	if ($_FILES[$key]["error"]==0) {
	$pathname=$dir . $_FILES[$key]["name"];
	$urlname='localhost:88/blog/upfiles/'.$_FILES[$key]['name'];
    $is=move_uploaded_file($_FILES[$key]['tmp_name'], $pathname);
		if (!$is) {
			die("上传失败");
		}
		$json = array("success"=> true,
		  				"msg"=> "", 
		 				 "file_path"=> $urlname 
		 				 );
		echo json_encode($json);
		}
}