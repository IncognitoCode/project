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
        $.post("phplib/saveChanges.php", {id: id[i].value, name: name[i].value, desc: desc[i].value, value: value[i].value});
    }
    document.location.href = "";
}
function saveChangesConDev(){
    var id = document.getElementsByName("tableId");
    var name = document.getElementsByName("tableName");
    var ip = document.getElementsByName("tableIp");
    var port = document.getElementsByName("tablePort");
    var status = document.getElementsByName("tableStatus");

    for(var i = 0; i < id.length; i++)
        $.post("phplib/saveChanges.php", {id: id[i].value,
            name: name[i].value,
            ip: ip[i].value,
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
            var protocol = $("#newTableProtocol :selected").val();
            var port = document.getElementById("newTablePort");
            var enable = $("#newTableEnabled").prop("checked");
            var status = document.getElementById("newTableStatus");
            $.post("phplib/addDevice.php", {name: name.value,
                ip: ip.value,
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