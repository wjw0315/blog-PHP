<?php
include('./check.php');
$page= array(
			'pid'=>0,
			'title' =>'' ,
			'author'=>'',
			'content'=>'',
				 );
if ($input->get('do')=='add') {
	$title=$input->post('title_add');
	$author=$input->post('author_add');
	$content=$input->post('content_add');
	$intime=time();
	if (empty($title) || empty($author) || empty($content)) {
		die("内容不能为空");
	}
	$sql="insert into page (`title`,`author`,`content`,`intime`,`uptime`) values ('{$title}','{$author}','{$content}','{$intime}',0)";
	$mysqli_result=$db->query($sql);
	if (isset($mysqli_result)) {
		header("location:blog.php");
	}else{die("执行失败");}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>添加博客</title>
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
		  <h1>添加博客 <small class ="pull-right" ><a class="btn btn-default" href="blog.php" role="button">返回</a>
		  </small></h1>
		  <hr/>
		  <div class="rows">
			<form class="form-horizontal" action="blog_add.php?do=add" method="post">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
			    <div class="col-sm-6">
			      <input type="text" class="form-control" name="title_add" id="inputEmail3"  placeholder="请输入标题" value="<?php echo $page['title'];?>">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">作者</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="author_add" id="inputPassword3"  placeholder="请输入作者" value="<?php echo $page['author'];?>">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">正文</label>
			    <div class="col-sm-8">
			      <textarea id="content" type="text" class="form-control" name="content_add" style="height:300px " ><?php echo $page['content'];?></textarea>
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