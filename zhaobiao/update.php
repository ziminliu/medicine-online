<?php
	session_start();
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$ZIId=$_POST["Id"];
$ZComId=$_SESSION["ID"];
$ZName=$_POST["meName"];
$ZQuanti=$_POST["meQuanti"];
$Deadline=$_POST["meTime"];
$Money=$_POST["meMoney"];

$sql = "update zhaobiaoinfo  set ZName='$ZName', Quantity='$ZQuanti', Deadline='$Deadline' , Money='$Money'  where ZIId='$ZIId'";
 
if ($conn->query($sql) === TRUE) {
    echo "招标信息发布成功";
	echo '<script>window.location.replace("zbinfo.php")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>