<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理员界面</title>

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
	if(!isset($_SESSION["ID"]))
	{
		echo '<script>window.location.replace("../login/index.php")</script>';
	}
	  $id=$_SESSION["ID"];
	$name=$_SESSION["NAME"];
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
			<li class="active"><a href="../manager/mazb.php">管理招标企业</a></li>
			<li class="active"><a href="../manager/matb.php">管理投标企业</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="">ID:<?php echo $id;?></a></li>
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
