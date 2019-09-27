<?php

// 创建连接
$conn = new mysqli("localhost", "root", "123456789","project");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$id=$_SESSION["ID"];
/*从数据库比对密码*/
$row='Z5d8199f1b77';
$sql1 = "SELECT toubiaoinfo.TId,toubiaocom.TId FROM toubiaoinfo left join toubiaocom on toubiaoinfo.TComId=toubiaocom.TId where  ZId='Z5d80ed1844f'";
echo $sql1;
$result1 = $conn->query($sql1);
while($row1 = $result1->fetch_assoc()){
	print_r($row1);
}
?>