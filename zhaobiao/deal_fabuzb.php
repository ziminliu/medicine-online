<?php
	session_start();
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
//生成招标ID
$ZId='Z'.uniqid();
$ZComId=$_SESSION["ID"];
$ZName=$_POST["meName"];
$ZQuanti=$_POST["meQuanti"];
$Deadline=$_POST["meTime"];
$Money=$_POST["meMoney"];

$sql = "INSERT INTO  zhaobiaoinfo VALUES ('$ZId', '$ZComId', '$ZName', '$ZQuanti', '$Deadline' , '$Money')";
 
if ($conn->query($sql) === TRUE) {
    echo "招标信息发布成功";
	echo '<script>window.location.replace("zbinfo.php")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>