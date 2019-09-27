<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>招标企业</title>

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
    echo '<script>window.location.replace("index.php")</script>';
}
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$id=$_SESSION["ID"];
/*从数据库获取相应id的企业信息*/
$sql = "SELECT * FROM zhaobiaocom where ZId='$id'";
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
			<li class="active"><a href="../zhaobiao/self_info.php"><?php echo $row['ZName']; ?></a></li>
			<li class="active"><a href="">招标企业</a></li>
			<li class="active"><a href="../zhaobiao/zbinfo.php">招标信息</a></li>
			<li class="active"><a href="../zhaobiao/zbinfo.php">发布招标</a></li>
			<li class="active"><a href="#">应标情况</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="#">ID：<?php echo $id; ?></a></li>
        <li><a href="../logout.php" class="text-primary" id="blue">注销</a></li>
      </ul>
	</div>
	</div>
</nav>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
