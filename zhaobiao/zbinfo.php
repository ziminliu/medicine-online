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
    echo '<script>window.location.replace("../login/index.php")</script>';
}
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
	/*保存招标企业的名字*/
$id=$_SESSION["ID"];
$name=$_SESSION["NAME"];
/*从数据库比对密码*/
$keyword=$_POST["keyword"];
if($keyword!=='')
{
$sql ="SELECT * FROM zhaobiaoinfo where ZName like '%$keyword%'  and ZComId='$id'";
}
else
{
$sql = "SELECT * FROM zhaobiaoinfo where ZComId='$id'";}
$result = $conn->query($sql);
?>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="">药品招投标系统</a>
	</div>
	<div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="self_info.php"><?php echo $name; ?></a></li>
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
 </div>
<table class="table table-bordered">
	<caption><h1>招标信息</h1></caption>
	<form action="" method="post">
	<div class="input-group col-md-3" style="margin-top:0px positon:relative">
       <input type="text" class="form-control" name="keyword" placeholder="请输入关键字" / >
            <span class="input-group-btn">
				<input type="submit" class="btn btn-info btn-search" value="查找"/>
            </span>
		</form>
	
	<thead>
		<tr>
			<th>招标ID</th>
			<th>招标企业ID</th>
			<th>药品名称</th>
			<th>药品总量</th>
			<th>招标截止日期</th>
			<th>保证金</th>
			<th>更新</th>
		</tr>
	</thead>
	<tbody>
		<?php
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
			
<?php  echo '
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#'.$row['ZIId'].'">更新
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
					更新
				</h4>
			</div>
			
<form class="form-horizontal" role="form" action="update.php" method="post">
	<div class="form-group">
		<label for="meName" class="col-sm-2 control-label">招标ID</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="Id" name="Id" readonly="readonly" value='.$row['ZIId'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="meName" class="col-sm-2 control-label">药品名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="meName" name="meName" value='.$row['ZName'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="meQuanti" class="col-sm-2 control-label">药品总量</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="meQuanti" name="meQuanti" value='.$row['Quantity'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="meTime" class="col-sm-2 control-label">招标截止日期</label>
		<div class="col-sm-10">
			<input type="date" class="form-control" id="meTime"  name="meTime" value='.$row['Deadline'].'>
		</div>
	</div>
	<div class="form-group">
		<label for="meMoney" class="col-sm-2 control-label">投标保证金</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="meMoney"  name="meMoney" value='.$row['Money'].'>
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
