<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>投标企业</title>

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
/*从数据库比对密码*/
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
			<li class="active"><a href="#">投标企业</a></li>
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
	
	
<table class="table table-striped">
	<caption>条纹表格布局</caption>
	<thead>
		<tr>
			<th>投标id</th>
			<th>招标id</th>
			<th>药品名称</th>
			<th>投标日期</th>			
			<th>截止日期</th>
			<th>保证金</th>
			<th>投标金额</th>
		</tr>
	</thead>
	<tbody>
		<?php
$sql = "SELECT * FROM zhaobiaoinfo inner join toubiaoinfo on toubiaoinfo.ZIId=zhaobiaoinfo.ZIId where TComId=$id";
$result = $conn->query($sql);
		   while($row = $result->fetch_assoc()){
		?>
		<tr>
			<td><?php echo $row['TIId']; ?></td>
			<td><?php echo $row['ZIId']; ?></td>
			<td><?php echo $row['ZName']; ?></td>
			<td><?php echo $row['TDate']; ?></td>
			<td><?php echo $row['Deadline']; ?></td>
			<td><?php echo $row['Money']; ?></td>
			<td><?php echo $row['TMoney']; ?></td>
			
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
