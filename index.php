<!DOCTYPE HTML>
<html>
<head>
<title>Connected Devices</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery.js"></script>
<script src="js/script.js"></script>
<script>
	function editTable(isEdit){
		if(isEdit){
			$('#mainTbl').hide('fast');
			$('#editable').show('fast');
			$('#mainButt').hide('fast');
			$('#editButt').show('fast');
		}else{
			$.post("phplib/deleteSelected.php", {clear: true});
			$('#mainTbl').show('fast');
			$('#editable').hide('fast');
			$('#mainButt').show('fast');
			$('#editButt').hide('fast');
		}
	}
	function changeDelete(delId){
		if($("#"+delId).prop("checked") == false)
			$.post("phplib/deleteSelected.php", {id: delId, isDelete: 0});
		else
			$.post("phplib/deleteSelected.php", {id: delId, isDelete: 1});
	}
	function saveChanges(){
		var id = document.getElementsByName("tableId");
		var name = document.getElementsByName("tableName");
		var ip = document.getElementsByName("tableIp");
		var subnet = document.getElementsByName("tableSubnet");
		var port = document.getElementsByName("tablePort");
		var status = document.getElementsByName("tableStatus");
		
		for(var i = 0; i < id.length; i++)
			$.post("phplib/saveChanges.php", {id: id[i].value, 
											  name: name[i].value, 
											  ip: ip[i].value, 
											  subnet: subnet[i].value,
											  port: port[i].value,
											  status: status[i].value});
		
		document.location.href = "";
	}
	function addNewDevice(action){
		switch (action){
			case 1:
				$('#newDevice').show('fast');
				$('#mainButt').hide('fast');
				$('#newDeviceButtons').show('fast');
				break;
			case 2:
				var name = document.getElementById("newTableName");
				var ip = document.getElementById("newTableIp");
				var subnet = document.getElementById("newTableSubnet");
				var protocol = $("#newTableProtocol :selected").val();
				var port = document.getElementById("newTablePort");
				var enable = $("#newTableEnabled").prop("checked");
				var status = document.getElementById("newTableStatus");
				$.post("phplib/addDevice.php", {name: name.value, 
											  	ip: ip.value, 
											  	subnet: subnet.value,
											  	port: port.value,
											  	protocol: protocol,
											  	enable: enable,
											  	status: status.value});
				document.location.href = "";
				break;
			case 3:
				$('#newDevice').hide('fast');
				$('#mainButt').show('fast');
				$('#newDeviceButtons').hide('fast');
				break;
		}
	}
</script>
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
		<li><a href="">Web Views</a></li>
		<li><a href="">Alarms</a></li>
	</ul>
</div>
<div class="clr"></div>
<div id="tableWrap">
	<div id="table">
		<div id="tableHeader">
			<h1 style="width: 20px">#</h1>
			<h1 style="width: 90px">Name</h1>	
			<h1 style="width: 90px">IP Adress</h1>	
			<h1 style="width: 95px">Subnet Mask</h1>	
			<h1 style="width: 110px">Protocol</h1>	
			<h1 style="width: 30px">Port</h1>	
			<h1 style="width: 40px">Enable</h1>	
			<h1 style="width: 60px">Status</h1>	
		</div>
		<div class="clr"></div>
		<div id="mainTbl">
<? 
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
				<h2 id='subnet$id' style='width: 95px'>$subnet</h2>
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
?>
</div>
<div id="editable">	
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
				<h2 id='subnet$id' style='width: 95px'>
					<input style='width: 70px' type='text' name='tableSubnet' value='$subnet'>
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
		
		echo "<h2 id='statusEdit$id' style='width: 60px'>
				<input style='width: 60px' type='text' id='statusEditInput$id' name='tableStatus' value='$status'>
			</h2>";
		
		echo "</div><div class='clr'></div>";
	}
?>
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
			<h2 style="width: 95px">
				<input style="width: 70px" type="text" id="newTableSubnet" value="">
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
		<a onclick="saveChanges()" class="button">Save Changes</a>
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