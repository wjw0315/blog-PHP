<?php
include('./check.php');

$aid=$input->get('aid');
//var_dump($aid);
$item= array(
			'aid'=>0,
			'auser' =>'' ,
			'apass'=>'',
				 );
//var_dump($aid);
if ($aid>0) {
	$sql="select * from admin where `aid`='{$aid}'";
	$mysqli_result=$db->query($sql);
	$item=$mysqli_result->fetch_array(MYSQLI_ASSOC);
//var_dump($item);
}

if ($input->get('do')=='re') {
	$auser=$input->post('auser');
	$apass=$input->post('apass');
	$aid=(int)$input->post('aid');
	//var_dump($aid);
	if (empty($auser)) {
		exit("用户名不能为空");}

	if(empty($apass)){
	$sql="update admin set `auser`='{$auser}'  where `aid`='{$aid}' ";
	$mysqli_result=$db->query($sql);
	} else{ 
		$sql="update admin set `auser`='{$auser}',`apass`='{$apass}' where `aid`='{$aid}' ";
				$mysqli_result=$db->query($sql);			
		}
		header("location:auser.php");
		exit;
}




?>
<!DOCTYPE html>
<html>
<head>
	<title>修改管理员</title>
	<?php include(PATH.'/header.inc.php'); ?>
</head>
<body>
<?php include('./nav.inc.php'); ?>
<div class="container">
		<div class="page-header">
		  <h1>修改管理员 <small class ="pull-right" ><a class="btn btn-default" href="auser.php" role="button">返回</a>
		  </small></h1>
		  <hr/>
		  <div class="rows">
			<form class="form-horizontal" action="auser_re.php?do=re" method="post">
				 <input type="hidden" name="aid" value="<?php echo $aid;?>" />
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">账号名</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="auser" id="inputEmail3" placeholder="请输入修改账号" value="<?php echo $item['auser'];?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
			    <div class="col-sm-6">
			      <input type="password" class="form-control" name="apass" id="inputPassword3" placeholder="请输入修改密码">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">提交修改</button>
			    </div>
			  </div>
			</form>
    </div>
	</div>
</div>

</body>
</html>