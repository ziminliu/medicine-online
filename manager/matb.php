<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>投标企业信息管理</title>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body><style>
#blue{
	color: blue;
		}
	</style>
</head>
<body >
	<?php 
	session_start();
	if(!isset($_SESSION["ID"]))
	{
		echo '<script>window.location.replace("../login/index.php")</script>';}
	  $id=$_SESSION["ID"];
	$name=$_SESSION["NAME"];
	
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql = "SELECT * FROM toubiaocom ";
$result = $conn->query($sql);
	?>
<nav class="navbar navbar-default" id="clfo" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">药品招投标系统</a>
	</div>
	<div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="#"><?php echo $name;?></a></li>
			<li class="active"><a href="#">管理员</a></li>
			<li class="active"><a href="mazb.php">管理招标企业</a></li>
			<li class="active"><a href="">管理投标企业</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#">ID:<?php echo $id;?></a></li>
        <li><a href="../logout.php" class="text-primary" id="blue">注销</a></li>
      </ul>
	</div>
	</div>
</nav>
<!--表格内部引入模态框，提交数据表单进行信息更新-->
<table class="table table-bordered">
	<caption>招标信息</caption>
	<thead>
		<tr>
			<th>投标企业ID</th>
			<th>密码</th>
			<th>企业名称</th>
			<th>企业邮箱</th>
			<th>法人代表</th>
			<th>联系电话</th>
			<th>更新信息</th>
		</tr>
	</thead>
	<tbody>
		<?php
		   while($row = $result->fetch_assoc()){
		?>
		<tr>
			<td><?php echo $row['TId']; ?></td>
			<td><?php echo $row['TPassword']; ?></td>
			<td><?php echo $row['TName']; ?></td>
			<td><?php echo $row['TEmail']; ?></td>
			<td><?php echo $row['TOwner']; ?></td>
			<td><?php echo $row['TNumber']; ?></td>
			<td>
			
<?php  echo '
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#'.$row['TId'].'">更新
</button>
<!-- 模态框（Modal） -->
<div class="modal fade" id="'.$row['TId'].'" tabindex="-1" role="dialog" aria-labelledby="'.$row['TId'].'Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="'.$row['TId'].'Label">
					更新
				</h4>
			</div>
			
<form class="form-horizontal" role="form" action="deal_updatetb.php" method="post">
	<div class="form-group">
		<label for="Id" class="col-sm-2 control-label">企业ID</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="Id" name="Id" readonly="readonly" value='.$row['TId'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="Password" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="Password" name="Password" value='.$row['TPassword'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="Name" class="col-sm-2 control-label">企业名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="Name" name="Name" value='.$row['TName'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="Email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="Email"  name="Email" value='.$row['TEmail'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="Owner" class="col-sm-2 control-label">法人代表</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="Owner"  name="Owner" value='.$row['TOwner'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="Number" class="col-sm-2 control-label">联系电话</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="Number"  name="Number" value='.$row['TNumber'].'>
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
?>
			
			
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