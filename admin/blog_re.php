<?php
include('./check.php');
$pid=(int)$input->get('pid');
//var_dump($pid);
$page= array( 
			'pid'=>0,
			'title' =>'' ,
			'author'=>'',
			'content'=>'',
				 );
if ($pid>0) {
	$sql="select * from page where `pid`='{$pid}'";
	$mysqli_result=$db->query($sql);
	$page=$mysqli_result->fetch_array(MYSQLI_ASSOC);
	//var_dump($page);
}
if ($input->get('do')=='re') {
	$title=$input->post('title');
	$author=$input->post('author');
	$content=$input->post('content');
	$uptime=time();
	
	$pid=$input->post('pid');
	var_dump($pid);
	if (empty($title)||empty($author)||empty($content)) {
		die("内容不能为空");
	}
	$sql="update page set `title`='{$title}',`author`='{$author}',`content`='{$content}',`uptime`= '{$uptime}'  where `pid`='{$pid}'";
	$is=$db->query($sql);
	if (isset($is)) {
		header("location:blog.php");
	}else{die("执行失败");}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>修改博客</title>
	<?php include(PATH.'/header.inc.php'); ?>
	<link rel="stylesheet" type="text/css" href="../themes/simditor-2.3.5/styles/simditor.css" />
	<script type="text/javascript" src="../themes/simditor-2.3.5/scripts/module.js"></script>
	<script type="text/javascript" src="../themes/simditor-2.3.5/scripts/hotkeys.js"></script>
	<script type="text/javascript" src="../themes/simditor-2.3.5/scripts/uploader.js"></script>
	<script type="text/javascript" src="../themes/simditor-2.3.5/scripts/simditor.js"></script>
</head>
<body>
<?php include('./nav.inc.php'); ?>
<div class="container">
		<div class="page-header">
		  <h1>修改博客 <small class ="pull-right" ><a class="btn btn-default" href="blog.php" role="button">返回</a>
		  </small></h1>
		  <hr/>
		  <div class="rows">
			<form class="form-horizontal" action="blog_re.php?do=re" method="post">
			<input type="hidden" name="pid" value="<?php echo $pid ?>">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="title" id="inputEmail3"  placeholder="请输入标题" value="<?php echo $page['title'];?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">作者</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="author" id="inputPassword3"  placeholder="请输入作者" value="<?php echo $page['author'];?>">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">正文</label>
			    <div class="col-sm-8">
			      <textarea id="content" type="text" class="form-control" name="content" style="height:300px " ><?php echo $page['content'];?></textarea>
			      <script>
						var editor=new Simditor(
							{textarea:$('#content'),
								upload:{
									url: 'blog_upload.php',
									filekey: 'upload_file'
								}
						
						 });
					</script>
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