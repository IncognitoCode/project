<!DOCTYPE HTML>
<html>
<head>
<title>Tag Database</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="header">
	<div id="logo"></div>
	<a class="headerButtons" href="">Device Settings</a>
	<a class="headerButtons" href="">App Configurations</a>
</div>

<div class="clr"></div>

<div id="subHeader">
	<p>01:23:45:67:89:AB &nbsp; &nbsp; &nbsp; IP: 192.168.1.12</p>
	<h6>alexk &nbsp; &nbsp; | &nbsp; &nbsp; <a href="">Logout</a></h6>
</div>

<div class="clr"></div>

<div id="navigation">
	<ul>
		<li><a href="index.php">Connected Devices</a></li>
		<li><a href="tag.php">Tag Database</a></li>
		<li><a href="datacol.php">Data Collection</a></li>
		<!--<li><a href="">Web Views</a></li>
		<li><a href="">Alarms</a></li>!-->
	</ul>
</div>

<div id="tableWrap" style="height: 227px">

	<div id="table"/>

		<div id="tableHeader">
			<h1 style="width: 20px">#</h1>
			<h1 style="width: 60px">Name</h1>	
			<h1 style="width: 75px">Description</h1>	
			<h1 style="width: 50px">Type</h1>	
			<h1 style="width: 40px">Lenght</h1>	
			<h1 style="width: 110px">Device</h1>	
			<h1 style="width: 80px">Address</h1>	
			<h1 style="width: 100px">Curent Value</h1>	
		</div>

		<div class="clr"></div>

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

		echo "
			<div class='tableRow'>
			<h2 style='width: 20px'>1</h2>
			<h2 style='width: 60px'>Device #1</h2>
			<h2 style='width: 75px'>192.168.1.124</h2>
			<h2 style='width: 50px'>
				<select name='protocol'>
					<option name='ModbusTCP'>char[]</option>
				</select>
			</h2>
			<h2 style='width: 40px'>5</h2>
			<h2 style='width: 110px'>
				<select name='protocol'>
					<option name='ModbusTCP'>Internal</option>
				</select>
			</h2>
			<h2 style='width: 80px' class='online'>30001...30005</h2>
			<h2 style='width: 100px'>FAULT</h2>
		</div>

		<div class='clr'></div>";
	}
?>

		<div class="tableRow">
			<h2 style="width: 20px">2</h2>
			<h2 style="width: 60px">Device #2</h2>
			<h2 style="width: 75px">192.168.1.123</h2>
			<h2 style="width: 50px">
				<select name="protocol">
					<option name="ModbusTCP">bool[]</option>
				</select>
			</h2>
			<h2 style="width: 40px">...</h2>
			<h2 style="width: 110px">
				<select name="protocol">
					<option name="ModbusTCP">Device #2</option>
				</select>
			</h2>
			<h2 style="width: 80px" class="disabled">100003</h2>
			<h2 style="width: 100px">1</h2>
		</div>

		<div class="clr"></div>
		
		<div class="tableRow">
			<h2 style="width: 20px">3</h2>
			<h2 style="width: 60px">Device #3</h2>
			<h2 style="width: 75px">192.168.1.10</h2>
			<h2 style="width: 50px">
				<select name="protocol">
					<option name="ModbusTCP">int16</option>
				</select>
			</h2>
			<h2 style="width: 40px">2</h2>
			<h2 style="width: 110px">
				<select name="protocol">
					<option name="ModbusTCP">Device #2</option>
				</select>
			</h2>
			<h2 style="width: 80px" class="offline">30006...30007</h2>
			<h2 style="width: 100px">31331</h2>
		</div>

		<div class="clr"></div>

		<div class="tableRow">
			<h2 style="width: 20px">4</h2>
			<h2 style="width: 60px">Device #4</h2>
			<h2 style="width: 75px">192.168.2.13</h2>
			<h2 style="width: 50px">
				<select name="protocol">
					<option name="ModbusTCP">real</option>
				</select>
			</h2>
			<h2 style="width: 40px">8</h2>
			<h2 style="width: 110px">
				<select name="protocol">
					<option name="ModbusTCP">Device #1</option>
				</select>
			</h2>
			<h2 style="width: 80px" class="online">30020...30027</h2>
			<h2 style="width: 100px">15.14141</h2>
		</div>

		<div class="clr"></div>

		<div class="tableRow">
			<h2 style="width: 20px">5</h2>
			<h2 style="width: 60px">Device #5</h2>
			<h2 style="width: 75px">192.168.1.15</h2>
			<h2 style="width: 50px">
				<select name="protocol">
					<option name="ModbusTCP">bool</option>
				</select>
			</h2>
			<h2 style="width: 40px">...</h2>
			<h2 style="width: 110px">
				<select name="protocol">
					<option name="ModbusTCP">Device #3</option>
				</select>
			</h2>
			<h2 style="width: 80px" class="disabled">10020</h2>
			<h2 style="width: 100px">*****</h2>
		</div>

		<div class="clr"></div>

		<div class="tableRow">
			<h2 style="width: 20px">6</h2>
			<h2 style="width: 60px">Device #6</h2>
			<h2 style="width: 75px">192.168.1.34</h2>
			<h2 style="width: 50px">
				<select name="protocol">
					<option name="ModbusTCP">int32</option>
				</select>
			</h2>
			<h2 style="width: 40px">...</h2>
			<h2 style="width: 110px">
				<select name="protocol">
					<option name="ModbusTCP">Internal</option>
				</select>
			</h2>
			<h2 style="width: 80px" class="online">...</h2>
			<h2 style="width: 100px">166144</h2>
		</div>
		<div class="clr"></div>
	</div>
	
<div id="bottomButtons">
	<a href="" class="button">New Tag</a>
	<a href="" class="button">Edit</a>
	<a href="" class="button">Monitor Values</a>
	<div class="clr"></div>
</div>

</body>
</html>