<?php
require_once('phplib/connect.php');
$sql = "SELECT * FROM devices";
$res = mysql_query($sql);

while($row = mysql_fetch_array($res)){
    $id = $row['id'];
    $name = $row['name'];
    $desc = $row['desc'];
    $value = $row['value'];

    echo "
		<div class='tableRow'>
			<h2 style='width: 20px'>$id</h2>
			<h2 style='width: 70px'>$name</h2>
			<h2 style='width: 110px'>$desc</h2>
			<h2 style='width: 130px'>
				<input name='check' type='checkbox'/>
			</h2>
			<h2 style='width: 110px'>$value</h2>
		</div>
		<div class='clr'></div>
	";
}
