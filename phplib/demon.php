<?php
exit();
header ('Content-type: text/html; charset=utf-8');
require_once('connect.php');

$devicesCount = mysql_query("SELECT COUNT(id) FROM devices");
$devicesCount = mysql_fetch_array($devicesCount);
$devicesCount = $devicesCount[0];

$random1 = rand(0, 5);
$random2 = rand(0, 5);

if($random1 == $random2){
	$id = rand(1, $devicesCount);
	$column = rand(1, 7);

	switch ($column){
		case 1: 
			$value = rand(10, 99);
			$value = "Device #".$value;
			$sql = "UPDATE devices SET name = '$value' WHERE id = '$id'";
			$json = array("upd" => "name", "id" => $id, "col" => $column, "values" => 1, "value" => $value);
			echo json_encode($json);		
			break;
		case 2:
			$value1 = rand(0, 255);
			$value2 = rand(0, 255);
			$sql = "UPDATE devices SET ip = '192.168.$value1.$value2' WHERE id = '$id'";
			$json = array("upd" => "ip", "id" => $id, "col" => $column, "values" => 2, "value1" => $value1, "value2" => $value2);
			echo json_encode($json);
			break;
		case 3:
			$value = rand(1, 2);
			if($value == 1) $value = "ModbusTCP";
			else $value = "HTTP";
			$sql = "UPDATE devices SET protocol = '$value' WHERE id = '$id'";
			$json = array("upd" => "protocol", "id" => $id, "col" => $column, "values" => 1, "value" => $value);
			echo json_encode($json);
			break;
		case 4:
			$value = rand(100, 999); 
			$sql = "UPDATE devices SET port = '$value' WHERE id = '$id'";
			$json = array("upd" => "port", "id" => $id, "col" => $column, "values" => 1, "value" => $value);
			echo json_encode($json);
			break;
		case 5: 
			$value = rand(0, 1);
			$sql = "UPDATE devices SET enable = '$value' WHERE id = '$id'";
			$status = mysql_query("SELECT status FROM devices WHERE id = '$id'");
			$status = mysql_fetch_array($status);
			$status = $status[0];
			$json = array("upd" => "enable", "id" => $id, "col" => $column, "values" => 1, "value" => $value, "status" => $status);
			echo json_encode($json);
			break;
		case 6: 
			$value = rand(1, 2);
			if($value == 1) $value = "Online";
			else if($value == 2) $value = "Offline";;
			$sql = "UPDATE devices SET status = '$value' WHERE id = '$id'";
			$json = array("upd" => "status", "id" => $id, "col" => $column, "values" => 1, "value" => $value);
			echo json_encode($json);
			break;
	}
	mysql_query($sql);
}


?>