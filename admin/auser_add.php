<?php
include('./check.php');
$item= array(
			'aid'=>0,
			'auser' =>'' ,
			'apass'=>'',
				 );
if ($input->get('do')=='add') {
	$auser=$input->post('auser_add');
	$apass=$input->post('apass_add');
	if (empty($auser) || empty($apass)) {
		die("账号或密码不能为空");
	}

	$sql="select * from admin where `auser`='{$auser}'";
	$mysqli_result=$db->query($sql);
	if ($rel=$mysqli_result->fetch_array(MYSQLI_ASSOC)) {
		die("管理员名重复");
	}

	$sql="insert into admin (`auser`,`apass`) values ('{$auser}','{$apass}')";
	$is=$db->query($sql);
	//var_dump($is);
	if ($is==true) {
		header('location:auser.php');
	}else{die("添加失败");}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>添加管理员</title>
	<?php include(PATH.'/header.inc.php'); ?>
</head>
<body>
<?php include('./nav.inc.php'); ?>
<div class="container">
		<div class="page-header">
		  <h1>添加管理员 <small class ="pull-right" ><a class="btn btn-default" href="auser.php" role="button">返回</a>
		  </small></h1>
		  <hr/>
		  <div class="rows">
			<form class="form-horizontal" action="auser_add.php?do=add" method="post">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">账号名</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="auser_add" id="inputEmail3"  placeholder="请输入账号" value="<?php echo $item['auser']; ?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
			    <div class="col-sm-6">
			      <input type="password" class="form-control" name="apass_add" id="inputPassword3"  placeholder="请输入密码"
			      value="<?php echo $item['apass']; ?>">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">提交</button>
			    </div>
			  </div>
			</form>
    </div>
	</div>
</div>

</body>
</html>