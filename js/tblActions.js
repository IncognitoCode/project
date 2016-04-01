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
function saveChangesDataCol(){
    var id = document.getElementsByName("tableId");
    var name = document.getElementsByName("tableName");
    var desc = document.getElementsByName("tableDesc");
    var value = document.getElementsByName("tableValue");

    for(var i = 0; i < id.length; i++){
        for(var j = i+1; j < id.length; j++)
            if(name[i].value == name[j].value){
                alert(name[i].value+" already used!");
                return;
            }
        $.post("phplib/saveChanges.php", {id: id[i].value, name: name[i].value, desc: desc[i].value, value: value[i].value});
    }
    document.location.href = "";
}
function saveChangesConDev(){
    var id = document.getElementsByName("tableId");
    var name = document.getElementsByName("tableName");
    var ip = document.getElementsByName("tableIp");
    var port = document.getElementsByName("tablePort");

    for(var i = 0; i < id.length; i++) {
        for (var j = i + 1; j < id.length; j++) {
            if (name[i].value == name[j].value) {
                alert(name[i].value + " already used!");
                return;
            }
            if (ip[i].value == ip[j].value) {
                alert(ip[i].value + " already used!");
                return;
            }
        }
        if(port < 0 || port > 65535){
            alert("Incorrect port value");
            return;
        }
        if(!verifyIP(ip[i].value))
            return;
        
        $.post("phplib/saveChanges.php", {
            id: id[i].value,
            name: name[i].value,
            ip: ip[i].value,
            port: port[i].value
        });
    }
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
            var protocol = $("#newTableProtocol :selected").val();
            var port = document.getElementById("newTablePort");
            var enable = $("#newTableEnabled").prop("checked");
            var status = document.getElementById("newTableStatus");

            if(!verifyIP(ip.value))
                return;

            $.post("phplib/addDevice.php", {name: name.value,
                ip: ip.value,
                port: port.value,
                protocol: protocol,
                enable: enable,
                status: status.value}, function(data){
                    var x = $.parseJSON(data);
                    var isset = x.isset;
                    var invalid = x.invalid;
                    if(isset == "true")
                        alert("Current name is already used");
                    if(invalid == "true")
                        alert("Invalid data send");
                    if(isset == "false" && invalid == "false")
                        alert("Device has been successfully added");});
            document.location.href = "";
            break;
        case 3:
            $('#newDevice').hide('fast');
            $('#mainButt').show('fast');
            $('#newDeviceButtons').hide('fast');
            break;
    }
}
function verifyIP (ip) {
    var errors = "";
    var ipPattern = /^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$/;
    var ipArray = ip.match(ipPattern);

    if (ip == "0.0.0.0")
        errors = errors + ip + ': special ip 0.0.0.0 can not be used.';
    else if (ip == "255.255.255.255")
        errors = errors + ip + ': special ip 255.255.255.255 can not be used.';
    if (ipArray == null)
        errors = errors + ip + ': incorrect ip adress.';
    else {
        for (var i = 0; i < 4; i++) {
            var thisSegment = ipArray[i];
            if (thisSegment > 255) {
                errors = errors + ip + ': incorrect ip adress.';
                i = 4;
            }
            if ((i == 0) && (thisSegment > 255)) {
                errors = errors + ip + ': incorrect ip adress.';
                i = 4;
            }
        }
    }

    if (errors != ""){
        alert (errors);
        return false;
    }
    return true;
}