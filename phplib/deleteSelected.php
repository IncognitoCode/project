<?php
require_once('connect.php');

if(isset($_POST['clear']) && $_POST['clear'] == true){
	$sql = "DELETE FROM todelete";
	mysql_query($sql);
	exit();
}

if(isset($_GET['isDelete']) && $_GET['isDelete'] == true){
	$sql = "SELECT * FROM todelete WHERE isDelete = '1'";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res)){
		$id = $row['id'];
		$sql = "DELETE FROM devices WHERE id = '$id'";
		mysql_query($sql);	
	}
	$sql = "DELETE FROM todelete";
	mysql_query($sql);
	echo "<script>document.location.href='../condev.php'</script>";
	exit();
}

if(isset($_POST['id']) && $_POST['id'] != null &&
   isset($_POST['isDelete']) && $_POST['isDelete'] != null){ 
	$id = $_POST['id'];
	$isDelete = $_POST['isDelete'];

	$sql = "SELECT * FROM todelete WHERE id = '$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);

	if(empty($row['id'])){
		$sql = "INSERT INTO `todelete` (`id`, `isDelete`) VALUES ('$id', '$isDelete')";
		mysql_query($sql);
		exit();
	}

	$sql = "UPDATE todelete SET isDelete = '$isDelete' WHERE id = '$id'";
	mysql_query($sql);
	exit();
}
?>