<?php 
include('./check.php');
$pagenum=$setting['pagenum'];
$sql1="select count(*) as total from admin";
$resule=$db->query($sql1);
$total=$resule->fetch_array(MYSQLI_ASSOC)['total'];
$maxpage=ceil($total / $pagenum);
$page=$input->get('page');
$page=$page<1?1:$page;
$offset=($page-1)*$pagenum;

$sql="select * from admin limit $offset,$pagenum ";
	$mysqli_result=$db->query($sql);
  	$rows=array( );
  	while($row=$mysqli_result->fetch_array(MYSQLI_ASSOC)){
  		$rows[]=$row;
  		//var_dump($row);
  	}
 
if ($input->get('do')=='delete') {

	$aid=$input->get('aid');
	//var_dump($aid);
	if ($aid==$session_aid) {
		die("不能删除自己！");
	}
	
	$sql="delete from admin where aid='{$aid}'";
	$is=$db->query($sql);
	if ($is==true) {
		header("location:auser.php");
	}else{die("删除失败");}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>管理员管理</title>
	<?php include(PATH.'/header.inc.php'); ?>
</head>
<body>
<?php include('./nav.inc.php'); ?>
	<div class="container">
		<div class="page-header">
		  <h1>管理员管理 <small class ="pull-right" ><a class="btn btn-default" href="auser_add.php" role="button">添加管理</a>
		  </small></h1>
		  <hr/>
		  <div class="rows">
		<table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>管理员账号</th>
          <th>管理</th>
        </tr>
      </thead>
      <?php foreach ($rows as $row ): 
      	
       ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $row['aid'] ?></th>
          <td><?php echo $row['auser'] ?></td>
          <td>
          <a href="auser_re.php?aid=<?php echo $row['aid']; ?>">修改</a> 
          <a href="auser.php?do=delete&aid=<?php echo $row['aid']; ?>">删除</a></td>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
         <nav aria-label="Page navigation">
          <ul class="pagination">
              <?php  $href1='<li><a href="auser.php?page=%d">%s</a></li>';
                        for ($i=1;$i<=$maxpage;$i++ ) {
                        echo sprintf($href1,$i,"第{$i}页");
                         }   
              ?>
          </ul>
        </nav>
    </div>
	</div>
</div>
</body>
</html>