<html>
<head>
    <title>Device Settings</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div id="header">
        <div id="logo"></div>
        <a class="headerButtons" href="settings.php">Device Settings</a>
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
    <div id="wrapper">
        <div id="changeSet">
            <p>Id</p>
            <input type="number" name="id"/><br/><br/>
            <p>Name</p>
            <input type="text" name="name"/><br/><br/>
            <p>Ip Adress</p>
            <input type="text" name="ip"/><br/><br/>
            <p>Protocol</p>
            <select name="protocol">
                <option value="ModbusTCP">ModbusTCP</option>
                <option value="HTTP">HTTP</option>
            </select><br/><br/>
            <p>Port</p>
            <input type="number" name="port"/><br/><br/>
        </div>
    </div>
</body>
</html>