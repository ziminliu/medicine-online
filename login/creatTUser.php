<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<body>
<?php
	
$servername = "localhost";
$username = "root";
$password = "123456789";
$datebase="project";
 
// 创建连接
$conn = new mysqli($servername, $username, $password,$datebase);
 
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功";
//保存从表单传过来的值，并插入到数据库中
$userID=$_POST["userID"];
$userEmail=$_POST["userEmail"];
$userName=$_POST["userName"];
$userOwner=$_POST["userOwner"];
$phoneNum=$_POST["phoneNum"];
$password=$_POST["password"];

$company="toubiaocom";
$sql = "INSERT INTO  $company VALUES ('$userID', '$password', '$userName', '$userEmail', '$phoneNum' , '$userOwner')";
 
if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功";
session_start();
$_SESSION["NAME"]=$userName;
$_SESSION["ID"]=$userID;
	echo '<script>window.location.replace("logintb.php")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
</body>
</html>