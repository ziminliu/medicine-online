<?php
session_start();
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$Id=$_POST["Id"];
$Password=$_POST["Password"];
$Name=$_POST["Name"];
$Email=$_POST["Email"];
$Number=$_POST["Number"];
$Owner=$_POST["Owner"];

$sql = "update toubiaocom  set TId='$Id', TPassword='$Password', TName='$Name' , TEmail='$Email' ,TNumber=$Number ,TOwner='$Owner' where TId='$Id'";
 
if ($conn->query($sql) === TRUE) {
    echo "招标信息发布成功";
	echo '<script>window.location.replace("matb.php")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>