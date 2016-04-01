<!DOCTYPE HTML>
<html>
<head>
<title>Connected Devices</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script src="js/tblActions.js"></script>
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
<li><a href="condev.php">Connected Devices</a></li>
		<li><a href="tag.php">Tag Database</a></li>
		<li><a href="datacol.php">Data Collection</a></li>
	</ul>
</div>
<div class="clr"></div>
<div id="tableWrap">
	<div id="table">
		<div id="tableHeader">
			<h1 style="width: 20px">#</h1>
			<h1 style="width: 90px">Name</h1>	
			<h1 style="width: 90px">IP Adress</h1>
			<h1 style="width: 110px">Protocol</h1>	
			<h1 style="width: 30px">Port</h1>	
			<h1 style="width: 40px">Enable</h1>	
			<h1 style="width: 60px">Status</h1>	
		</div>
		<div class="clr"></div>
		<div id="mainTbl">
			<? include('phplib/displays/conDev.php'); ?>
		</div>
		<div id="editable">
			<? include('phplib/displays/conDevEdit.php'); ?>
		</div>
	<div id="newDevice">	
		<div class="tableRow">
			<h2 style="width: 20px">
				New
			</h2>
			<h2 style="width: 90px">
				<input style="width: 90px" type="text" id="newTableName" value="">
			</h2>
			<h2 style="width: 90px">
				<input style="width: 90px" type="text" id="newTableIp" value="">
			</h2>
			<h2 style="width: 110px">
				<select id="newTableProtocol">
					<option value="ModbusTCP">ModbusTCP</option>
					<option value="HTTP">HTTP</option>
				</select>
			</h2>
			<h2 style="width: 30px">
				<input style="width: 30px" type="text" id="newTablePort" value="">
			</h2>
			<h2 style="width: 40px">
				<input type="checkbox" id="newTableEnabled"/>
			</h2>
			<h2 style="width: 60px">
				<input style="width: 60px" type="text" id="newTableStatus">
			</h2>
		</div>
		<div class="clr"></div>
	</div>
	</div>
</div>
<div id="mainButt">
	<div id="bottomButtons">
		<a onclick="addNewDevice(1)" class="button">New Device</a>
		<a onclick="editTable(true)" class="button">Edit</a>
		<a href="" class="button">Monitor Values</a>
		<div class="clr"></div>
	</div>
</div>
<div id="editButt">
	<div id="editButtons">
		<a href="phplib/deleteSelected.php?isDelete=true" class="button">Delete Selected</a>
		<a onclick="saveChangesConDev()" class="button">Save Changes</a>
		<a onclick="editTable(false)" class="button">Cancel Edits</a>
		<div class="clr"></div>
	</div>
</div>
<div id="newDeviceButtons">
	<div id="bottomButtons">
		<a onclick="addNewDevice(2)" class="button">Add Device</a>
		<a onclick="addNewDevice(3)" class="button">Cancel</a>
		<div class="clr"></div>
	</div>
</div>
</body>
</html>