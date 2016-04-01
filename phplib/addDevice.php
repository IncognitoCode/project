<?php
if (isset($_POST['name']) && 
	isset($_POST['ip']) &&
	isset($_POST['protocol']) &&
	isset($_POST['port']) &&
	isset($_POST['enable']) &&
	isset($_POST['status'])){

	$name = $_POST['name'];
	$ip = $_POST['ip'];
	$protocol = $_POST['protocol'];
	$port = $_POST['port'];
	$enable = $_POST['enable'];
	$status = $_POST['status'];

	if($name == "" || $ip == "" || $port == "" || $port < 0 || $port > 65535){
		$json = array("invalid" => "true");
		echo json_encode($json);
		exit();
	}
	else{
		$json = array("invalid" => "false");
		echo json_encode($json);
	}

	require_once('connect.php');

	$sql = "SELECT * FROM `devices` WHERE `name` = '$name'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	if(!empty($row['name'])){
		$json = array("isset" => "true");
		echo json_encode($json);
		exit();
	}
	else{
		$json = array("isset" => "false");
		echo json_encode($json);
	}

	$sql = "INSERT INTO `devices` (`id`, `name`, `ip`, `protocol`, `port`, `enable`, `status`, `desc`, `value`) 
						VALUES(NULL, '$name', '$ip', '$protocol', '$port', '$enable', '$status', '$desc', '$value')";
	mysql_query($sql);
	exit();
}