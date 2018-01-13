<?php
session_start();
include ('../config.php');
//include ('../core/input.class.php');
//include ('../core/db.class.php');
//$input=new input();
//$db=new db();


if($input->get('do')){
	$auser=$input->post('auser');
	$apass=$input->post('apass');
	//var_dump($auser,$apass);
	
$sql="select * from admin where `auser`='{$auser}' and `apass`='{$apass}' ";
	$mysqli_result=$db->query($sql);
	//var_dump($mysqli_result);
	$row=$mysqli_result->fetch_array(MYSQLI_ASSOC);
  	//var_dump($row);
  	if (is_array($row)) {
  		//$input->session('aid')=$input->get('aid');(错误写法)
  		$_SESSION['aid']=$row['aid'];
  		//var_dump($input->session('aid'));
  		header("location:home.php");
  	}else{die("账号密码错误");}

}
	
?>
<!DOCTYPE html>
<html>
	<meta charset="utf-8">
<head>
	<title>管理员登陆</title>
	<?php include(PATH.'/header.inc.php'); ?>

</head>
<body>
	<div class="containe" >
	<div class="row" style="margin-top: 200px">
		<div class="col-md-3"></div>
			<div class="col-md-6" >
				<div class="panel panel-primary">
				 <div class="panel-heading">管理员登陆</div>
				 <div class="panel-body">
				   		 <form class="form-horizontal"  action="login.php?do=check" method="post">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">账号</label>
						    <div class="col-sm-10">
						      <input ty

						      pe="texe"  name="auser" class="form-control" id="inputEmail3" placeholder="请输入管理员账号">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
						    <div class="col-sm-10">
						      <input type="password" name="apass" class="form-control" id="inputPassword3" placeholder="请输入密码">
						    </div>
						  </div>

						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-default">点击登录</button>
						    </div>
						  </div>
						</form>
				 </div>
				 <div class="panel-footer text-right" >版权所有 翻版必究</div>
				</div>

			</div>
		<div class="col-md-3"></div>
		</div>
	</div>
</body>
</html>