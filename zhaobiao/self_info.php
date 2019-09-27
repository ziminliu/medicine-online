<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
	
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
?>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="">药品招投标系统</a>
	</div>
	<div>
		<ul class="nav navbar-nav">
			<li class="active"><a href=""><?php echo $_SESSION["NAME"]; ?></a></li>
			<li class="active"><a href="">招标企业</a></li>
			<li class="active"><a href="zbinfo.php">招标信息</a></li>
			<li class="active"><a href="fabuzb.php">发布招标</a></li>
			<li class="active"><a href="yinbiao.php">应标情况</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#">ID:<?php echo $id; ?></a></li>
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
$sql = "SELECT * FROM zhaobiaocom where ZId='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
	
	
<form class="form-horizontal" role="form">
	<div class="form-group">
		<label for="firstname" class="col-lg-3 control-label">企业ID</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="firstname" readonly="readonly" value="<?php echo $row['ZId']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-lg-3 control-label">企业名称</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="lastname" readonly="readonly" value="<?php echo $row['ZName']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-lg-3 control-label">企业邮箱</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="lastname" readonly="readonly" value="<?php echo $row['ZEmail']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-lg-3 control-label">法人代表</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="lastname" readonly="readonly" value="<?php echo $row['ZOwner']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-lg-3 control-label">联系电话</label>
		<div class="col-lg-5">
			<input type="text" class="form-control" id="lastname" readonly="readonly" value="<?php echo $row['ZNumber']; ?>">
		</div>
	</div>
</form>

</body>
</html>