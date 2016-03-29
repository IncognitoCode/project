<?php
if(isset($_POST['id']) && isset($_POST['protocol'])){
	require_once('connect.php');
	$id = $_POST['id'];
	$protocol = $_POST['protocol'];
	$sql = "UPDATE devices SET protocol = '$protocol' WHERE id = '$id'";
	mysql_query($sql);
}
?>