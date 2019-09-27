<?php
$userID=$_POST["userID"];
$userPassword=$_POST["userPassword"];

// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");


// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}


/*从数据库比对密码，区分管理员，招标企业，投标企业，并跳到相应的个人界面*/
$sql = "SELECT * FROM manager where MId='$userID' and MPassword='$userPassword'";
$result = $conn->query($sql);

$sql1 = "SELECT * FROM zhaobiaocom where ZId='$userID' and ZPassword='$userPassword'";
$result1 = $conn->query($sql1);

$sql2 = "SELECT * FROM toubiaocom where TId='$userID' and TPassword='$userPassword'";
$result2 = $conn->query($sql2);

//保存会话
session_start();
if ($result->num_rows > 0) {
	$row=$result->fetch_assoc();
$_SESSION["NAME"]=$row['MName'];
$_SESSION["ID"]=$row['MId'];
	echo '<script>window.location.replace("loginma.php")</script>'; //跳转至管理员界面
    }
if ($result1->num_rows > 0) {
	$row=$result1->fetch_assoc();
$_SESSION["NAME"]=$row['ZName'];
$_SESSION["ID"]=$row['ZId'];
	echo '<script>window.location.replace("loginzb.php")</script>';  //跳转至招标企业界面
    }
if ($result2->num_rows > 0) {
	$row=$result2->fetch_assoc();
$_SESSION["NAME"]=$row['TName'];
$_SESSION["ID"]=$row['TId'];
	echo '<script>window.location.replace("logintb.php")</script>';		//跳转至投标企业界面
    }
else
	echo "<script>window.location.replace('index.php?prompt=wrong')</script>";  	//密码匹配错误，跳回登录界面
?>