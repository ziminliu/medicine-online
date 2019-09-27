<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>查看招标信息</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<style>
#blue{
	color: blue;
}
	</style>
</head>
<body>
<?php
	session_start();
	if(!isset($_SESSION['ID']))
{
    echo '<script>window.location.replace("../login/index.php")</script>';
}
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$id=$_SESSION["ID"];
/*得到与id匹配的结果集*/
$sql = "SELECT * FROM toubiaocom where TId='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">药品招投标系统</a>
	</div>
	<div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="self_info.php"><?php echo $row['TName']; ?></a></li>
			<li class="active"><a href="">投标企业</a></li>
			<li class="active"><a href="view_zbinfo.php">招标信息</a></li>
			<li class="active"><a href="mytb.php">我的投标</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#">ID：<?php echo $id; ?></a></li>
        <li><a href="../logout.php" class="text-primary" id="blue">注销</a></li>
      </ul>
	</div>
	</div>
</nav>
	
<table class="table table-hover">
	<caption><h2>招标信息</h2></caption>
	<thead>
		<tr>
			<th>招标ID</th>
			<th>企业ID</th>
			<th>药品名称</th>
			<th>总量</th>
			<th>截止日期</th>
			<th>保证金</th>
			<th>投标</th>
			<th>查看投标信息</th>
			<th>投标人数</th>
		</tr>
	</thead>
	<tbody>
		<?php
$sql = "SELECT * FROM zhaobiaoinfo ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
		   while($row = $result->fetch_assoc()){
		?>
		<tr>
			<td><?php echo $row['ZIId']; ?></td>
			<td><?php echo $row['ZComId']; ?></td>
			<td><?php echo $row['ZName']; ?></td>
			<td><?php echo $row['Quantity']; ?></td>
			<td><?php echo $row['Deadline']; ?></td>
			<td><?php echo $row['Money']; ?></td>
			<td>
		<!--模态框搭建表单隐藏数据信息，输入投标金额，跳转至添加投标信息页面add_tbinfo.php-->
<?php  echo '
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#'.$row['ZIId'].'">我要投标
</button>
<!-- 模态框（Modal） -->
<div class="modal fade" id="'.$row['ZIId'].'" tabindex="-1" role="dialog" aria-labelledby="'.$row['ZIId'].'Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="'.$row['ZIId'].'Label">
					请输入投标金额
				</h4>
			</div>
			
<form class="form-horizontal" role="form" action="add_tbinfo.php" method="post">
	<div class="form-group">
		<div class="col-sm-10">
			<input type="hidden" class="form-control"  name="ZId"  value='.$row['ZIId'].'>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-10">
			<input type="hidden" class="form-control"  name="TComId" value='.$_SESSION["ID"].'>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-10">
			<input type="text" class="form-control" name="TMoney" >
		</div>
	</div>
	
	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭
				</button>
				<button type="submit" class="btn btn-primary">
					提交更改
				</button>
			</div>
</form>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>'					
?></td>
			
<td>
<?php	
echo '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#a'.$row['ZIId'].'">查看投标
</button>
<!-- 模态框（Modal） -->
<div class="modal fade" id="a'.$row['ZIId'].'" tabindex="-1" role="dialog" aria-labelledby="a'.$row['ZIId'].'Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="a'.$row['ZIId'].'Label">
				'.$row['ZIId'].'
				</h4>
			</div>	
<table class="table table-condensed">
	<caption>投标信息</caption>
	<thead>
		<tr>
			<th>企业ID</th>
			<th>名称</th>
			<th>邮箱</th>
			<th>联系电话</th>
			<th>投标日期</th>
			<th>投标金额</th>
		</tr>
	</thead>
	<tbody>'	
?>
	
	
<?php
			//得到该列的招标id，并列出所有与此招标信息相关的投标信息
$sql1 = "SELECT * FROM toubiaoinfo left join toubiaocom on toubiaoinfo.TComId=toubiaocom.TId where  ZIId='".$row['ZIId']."'";
$result1 = $conn->query($sql1);
while($row1 = $result1->fetch_assoc()){
?>
<?php echo '
		<tr>
			<td>'.$row1['TId'].'</td>
			<td>'.$row1['TName'].'</td>
			<td>'.$row1['TEmail'].'</td>
			<td>'.$row1['TNumber'].'</td>
			<td>'.$row1['TDate'].'</td>
			<td>'.$row1['TMoney'].'</td>
		</tr>';?>
<?php } ?>
	<?php echo '
	</tbody>
</table>

		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>'					
?>			
</td>
			<td>
				<!--统计该招标项目含有多少投标人数-->
			<?php echo"$result1->num_rows"; ?>人
			</td>
</tr>
<?php } ?>
	</tbody>
</table>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
