<?php 
	session_start();
// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

date_default_timezone_set('PRC');
$TIId="T".uniqid();
$TComId=$_POST["TComId"];
$ZIId=$_POST["ZId"];
$TDate=date('Y-m-d H:i:s');
$TMoney=$_POST["TMoney"];

/*从数据库比对密码*/
$sql = "INSERT INTO `toubiaoinfo` (`TIId`, `TComId`, `ZIId`, `TDate`, `TMoney`) VALUES ('$TIId', '$TComId', '$ZIId', '$TDate', '$TMoney')";

if ($conn->query($sql) === TRUE) {
    echo '<script>window.location.replace("mytb.php")</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 
$conn->close();

?>