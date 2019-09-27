<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人信息</title>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	
<style>
#blue{
	color: blue;
}
	</style>
</head>
<?php 	
	session_start();
$id=$_SESSION["ID"];
	if(!isset($_SESSION["ID"]))
	echo '<script>window.location.replace("../login/index.php")</script>';
	?>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="#">药品招投标系统</a>
	</div>
	<div>
		<ul class="nav navbar-nav">
			<li class="active"><a href=""><?php echo $_SESSION["NAME"] ?></a></li>
			<li class="active"><a href="">投标企业</a></li>
			<li class="active"><a href="../toubiao/view_zbinfo.php">招标信息</a></li>
			<li class="active"><a href="../toubiao/mytb.php">我的投标</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="">ID：<?php echo $id; ?></a></li>
        <li><a href="../logout.php" class="text-primary" id="blue">注销</a></li>
      </ul>
	</div>
	</div>
</nav>
<?php 
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
/*从数据库比对密码*/
$sql = "SELECT * FROM toubiaocom where TId='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
	
<form class="form-horizontal" role="form">
	<div class="form-group">
		<label for="firstname" class="col-lg-3 control-label">企业ID</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="firstname" readonly="readonly" value="<?php echo $row['TId']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-lg-3 control-label">企业名称</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="lastname" readonly="readonly" value="<?php echo $row['TName']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-lg-3 control-label">企业邮箱</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="lastname" readonly="readonly" value="<?php echo $row['TEmail']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-lg-3 control-label">法人代表</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="lastname" readonly="readonly" value="<?php echo $row['TOwner']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-lg-3 control-label">联系电话</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="lastname" readonly="readonly" value="<?php echo $row['TNumber']; ?>">
		</div>
	</div>
</form>

	
	
</body>
</html>