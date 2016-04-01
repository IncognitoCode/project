<?
$sql = "SELECT * FROM `devices`";
$res = mysql_query($sql);
while($row = mysql_fetch_array($res)){
    $id = $row['id'];
    $name = $row['name'];
    $ip = $row['ip'];
    $subnet = $row['subnet'];
    $protocol = $row['protocol'];
    $port = $row['port'];
    $status = $row['status'];

    echo"
			<div class='tableRow'>
				<h2 style='width: 20px'>
					<input style='width: 20px' name='tableId' value='$id' type='checkbox' id='$id' onchange='changeDelete($id)'/>
				</h2>
				<h2 id='name$id' style='width: 90px'>
					<input style='width: 90px' type='text' name='tableName' value='$name'>
				</h2>
				<h2 id='ip$id' style='width: 90px'>
					<input style='width: 90px' type='text' name='tableIp' value='$ip'>
				</h2>
				<h2 style='width: 110px'>
					<select name='protocol$id' id='protocolEdit$id' onchange='changeProtocolEdit($id)'>";
    if($protocol == 'HTTP'){
        echo "
								<option value='HTTP'>HTTP</option>
								<option value='ModbusTCP'>ModbusTCP</option>";
    }
    if($protocol == 'ModbusTCP'){
        echo "
								<option value='ModbusTCP'>ModbusTCP</option>
								<option value='HTTP'>HTTP</option>";
    }
    echo "		</select>
				</h2>
				<h2 id='port$id' style='width: 30px'>
					<input style='width: 30px' type='text' name='tablePort' value='$port'>
				</h2>
				<h2 style='width: 40px'>";

    if($row['enable'])
        echo "<input id='checkEdit$id' type='checkbox' checked='true' onchange=\"isDisabledEdit($id, '$status')\" />";
    else
        echo "<input id='checkEdit$id' type='checkbox' onchange=\"isDisabledEdit($id, '$status')\" />";

    echo "</h2>";

    echo "<h2 id='statusEdit$id' style='width: 60px'> $status </h2>";

    echo "</div><div class='clr'></div>";
}
?>
