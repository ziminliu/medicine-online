<?php
$keyword=$_POST["keyword"];
if($keyword=='')
{
$sql = "SELECT * FROM zhaobiaoinfo where ZComId='$id'";
	echo $sql;
}
else
{
$sql ="SELECT * FROM zhaobiaoinfo where ZName like '%$keyword%' and ZComId='$id'";
echo $sql;}
?>