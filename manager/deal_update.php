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

$sql = "update zhaobiaocom  set ZId='$Id', ZPassword='$Password', ZName='$Name' , ZEmail='$Email' ,ZNumber=$Number ,ZOwner='$Owner' where ZId='$Id'";
 
if ($conn->query($sql) === TRUE) {
    echo "招标信息发布成功";
	echo '<script>window.location.replace("mazb.php")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>