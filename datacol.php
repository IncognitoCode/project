<!DOCTYPE HTML>
<html>
<head>
<title>Data Collection</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery.js"></script>
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
		var desc = document.getElementsByName("tableDesc");
		var value = document.getElementsByName("tableValue");
		
		for(var i = 0; i < id.length; i++){
			$.post("phplib/saveChanges.php", {id: id[i].value, name: name[i].value, desc: desc[i].value, value: value[i].value});
		}
		document.location.href = "";
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

<div id="tableWrap" style="height: 227px">

	<div id="table"/>

		<div id="tableHeader">
			<h1 style="width: 20px">#</h1>
			<h1 style="width: 70px">Name</h1>	
			<h1 style="width: 110px">Description</h1>	
			<h1 style="width: 130px">Collect Data Local</h1>		
			<h1 style="width: 110px">Curent Value</h1>	
		</div>
		<div class="clr"></div>
		<div id="mainTbl">

<?
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
?>
</div>
<div id="editable">
<?
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
			<h2 style='width: 110px'>
				<input style='width: 110px' type='text' name='tableValue' value='$value'>
			</h2>
		</div>
		<div class='clr'></div>
	";
}
?>

	</div>	
	</div>

<div id="mainButt">
	<div id="bottomButtons">
		<a onclick="editTable(true)" class="button" id="edit">Edit</a>
		<a onclick="" class="button">Monitor Values</a>
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

</body>
</html>