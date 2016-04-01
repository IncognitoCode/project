<?php
$sql = "SELECT * FROM devices";
$res = mysql_query($sql);
while($row = mysql_fetch_array($res)){
    $id = $row['id'];
    $name = $row['name'];
    $desc = $row['desc'];
    $value = $row['value'];
    echo "
		<div class='tableRow'>
			<h2 style='width: 20px'>
				<input style='width: 20px' name='tableId' value='$id' type='checkbox' id='$id' onchange='changeDelete($id)'/>
			</h2>
			<h2 style='width: 70px'>
				<input style='width: 70px' type='text' name='tableName' value='$name'>
			</h2>
			<h2 style='width: 110px'>
				<input style='width: 110px' type='text' name='tableDesc' value='$desc'>
			</h2>
			<h2 style='width: 130px'>
				<input style='width: 130px' name='check' type='checkbox'/>
			</h2>
			<h2 style='width: 110px'>$value</h2>
		</div>
		<div class='clr'></div>
	";
}