<?php
require_once('connect.php');
if(!isset($_POST['pid']) || !isset($_POST['value'])){
	exit();
}
$id = $_POST['pid'];
$value = $_POST['value'];
$sql = "UPDATE devices SET enable = '$value' WHERE id = '$id'";
mysql_query($sql);
?>