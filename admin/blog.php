<?php 
include('./check.php');
//每页显示的数据量
$pagenum=$setting['pagenum'];
//获取数据总条数
$sql1="select count(*) as total from page ";
$resule=$db->query($sql1);
$total=$resule->fetch_array(MYSQLI_ASSOC)['total'];
//计算总共有多少页
$maxpage=ceil($total / $pagenum);
$page=$input->get('page');
$page=$page<1?1:$page;
//偏移量
$offset=($page-1)*$pagenum;

$sql="select * from page limit $offset,$pagenum";
	$mysqli_result=$db->query($sql);
  	$rows=array( );
  	while( $row=$mysqli_result->fetch_array(MYSQLI_ASSOC)){
  		$rows[]=$row;
  	}
 if ($input->get('do')=='delete') {
 	$pid=$input->get('pid');
 	$sql="delete from page where `pid`='{$pid}'";
 	$is=$db->query($sql);
 	if (isset($is)) {
 		header("location:blog.php");
 	}else{die("删除失败");}
 }

?>
<!DOCTYPE html>
<html>
<head>
	<title>博客管理</title>
	<?php include(PATH.'/header.inc.php'); ?>
</head>
<body>
<?php include('./nav.inc.php'); ?>
	<div class="container">
		<div class="page-header">
		  <h1>博客管理 <small class ="pull-right" ><a class="btn btn-default" href="blog_add.php" role="button">添加博客</a>
		  </small></h1>
		  <hr/>
		  <div class="rows">
		<table class="table table-striped">
      <thead>
        <tr>
          <th>pid</th>
          <th>标题</th>
           <th>作者</th>
          <th>插入时间</th>
          <th>修改时间</th>
          <th>管理</th>
        </tr>
      </thead>
      <?php foreach ($rows as $row ): 
       ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $row['pid'] ?></th>
          <td><?php echo $row['title'] ?></td>
           <td><?php echo $row['author'] ?></td>
          <td><?php echo date("Y-m-d H:i:s",$row['intime'] );  ?></td>
          <td><?php echo date("Y-m-d H:i:s",$row['uptime'] ) ?></td>
          <td>
          <a href="blog_re.php?pid=<?php echo $row['pid']; ?>">修改</a> 
          <a href="blog.php?do=delete&pid=<?php echo $row['pid']; ?>">删除</a>
          </td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
<?php include('./page.inc.php') ?>
    </div>
	</div>
</div>
</body>
</html>