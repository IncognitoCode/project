<!DOCTYPE HTML>
<html>
<head>
<title>Data Collection</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery.js"></script>
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
			<h1 style="width: 70px">Name</h1>	
			<h1 style="width: 110px">Description</h1>	
			<h1 style="width: 130px">Collect Data Local</h1>		
			<h1 style="width: 110px">Curent Value</h1>	
		</div>
		<div class="clr"></div>
		<div id="mainTbl">
			<? include('phplib/displays/dataCol.php'); ?>
		</div>
		<div id="editable">
			<? include('phplib/displays/dataColEdit.php'); ?>
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
		<a onclick="saveChangesDataCol()" class="button">Save Changes</a>
		<a onclick="editTable(false)" class="button">Cancel Edits</a>
		<div class="clr"></div>
	</div>
</div>

</body>
</html>