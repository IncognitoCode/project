<?php
require_once('phplib/connect.php');
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
				<h2 style='width: 20px'>$id</h2>
				<h2 id='name$id' style='width: 90px'>$name</h2>
				<h2 id='ip$id' style='width: 90px'>$ip</h2>
				<h2 style='width: 110px'>
					<select name='protocol$id' id='protocol$id' onchange='changeProtocol($id)'>";
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
				<h2 id='port$id' style='width: 30px'>$port</h2>
				<h2 style='width: 40px'>";

    if($row['enable'])
        echo "<input id='check$id' type='checkbox' checked='true' onchange=\"isDisabled($id, '$status')\" />";
    else
        echo "<input id='check$id' type='checkbox' onchange=\"isDisabled($id, '$status')\" />";

    echo "</h2>";

    if($row['enable'])
        echo "<h2 id='status$id' style='width: 60px'>$status</h2>";
    else
        echo "<h2 id='status$id' style='width: 60px'>Disabled</h2>";

    echo "</div><div class='clr'></div>";
}