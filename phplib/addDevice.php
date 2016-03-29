<?php
if (isset($_POST['name']) && 
	isset($_POST['ip']) && 
	isset($_POST['subnet']) && 
	isset($_POST['protocol']) && 
	isset($_POST['port']) && 
	isset($_POST['enable']) &&
	isset($_POST['status'])){
	
	require_once('connect.php');
	
	$name = $_POST['name'];
	$ip = $_POST['ip'];
	$subnet = $_POST['subnet'];
	$protocol = $_POST['protocol'];
	$port = $_POST['port'];
	$enable = $_POST['enable'];
	$status = $_POST['status'];
	
	$sql = "INSERT INTO `devices` (`id`, `name`, `ip`, `subnet`, `protocol`, `port`, `enable`, `status`, `desc`, `value`) 
						VALUES(NULL, '$name', '$ip', '$subnet', '$protocol', '$port', '$enable', '$status', '$desc', '$value')";
	mysql_query($sql);
	exit();
}
?>