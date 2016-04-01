<?php
if (isset($_POST['id']) && $_POST['id'] != null &&
	isset($_POST['name']) && $_POST['name'] != null &&
	isset($_POST['ip']) && $_POST['ip'] != null &&
	isset($_POST['port']) && $_POST['port'] != null){

	require_once('connect.php');

	$id = $_POST['id'];
	$name = $_POST['name'];
	$ip = $_POST['ip'];
	$port = $_POST['port'];

	$sql = "UPDATE `devices` SET `name` = '$name', `ip` = '$ip', `port` = '$port' WHERE `id` = $id";
	mysql_query($sql);

}

if (isset($_POST['id']) && $_POST['id'] != null &&
	isset($_POST['name']) && $_POST['name'] != null &&
	isset($_POST['desc']) && $_POST['desc'] != null &&
	isset($_POST['value']) && $_POST['value'] != null){
	
	require_once('connect.php');
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$value = $_POST['value'];
	
	$sql = "UPDATE `devices` SET `name` = '$name', `desc` = '$desc', `value` = '$value' WHERE `id` = $id";
	mysql_query($sql);
		
}
?>