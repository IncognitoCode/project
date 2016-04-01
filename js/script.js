$(document).ready(function(){
	//setInterval('update()', 50);
});
function update(){
	$.ajax({
	  	url: "../phplib/demon.php",
	  	success: function(data){
			var x = $.parseJSON(data);
			var id = x.id;
			var value = x.value;
			var upd = x.upd;
			var status = x.status;
			switch (upd){
				case 'name':
					$("h2#name"+id).text(value);
					break;
				case 'ip':
					$("h2#ip"+id).text(value);
					break;
				case 'port':
					$("h2#port"+id).text(value);
					break;
				case 'status':
					$("h2#status"+id).text(value);
					break;
				case 'protocol':
					$("#protocol"+id+" [value='"+value+"']").attr("selected", "selected");
					changeProtocol(id);
					break;
				case 'enable':
					if(value == 0){
						$("#check"+id).prop("checked", false); 	
						isDisabled(id, status);
					}
					if(value == 1){
						$("#check"+id).prop("checked", true);
						isDisabled(id, status);		
					}
					break;
			}
		}
	});
}
function isDisabled(devId, devStatus){
	if($("#check"+devId).prop("checked") == false){
		$("h2#status"+devId).text("Disabled");
		$.post("../phplib/enable.php", {pid: devId, value: 0});
	}
	else {
		$("h2#status"+devId).text(devStatus);
		$.post("../phplib/enable.php", {pid: devId, value: 1});
	}
}
function isDisabledEdit(devId, devStatus){
	if($("#checkEdit"+devId).prop("checked") == false)
		$.post("../phplib/enable.php", {pid: devId, value: 0});
	else
		$.post("../phplib/enable.php", {pid: devId, value: 1});
}
function changeProtocol(devId){
	var value = $("#protocol"+devId+" :selected").val();
	$.post("../phplib/protocol.php", {id: devId, protocol: value});
}
function changeProtocolEdit(devId){
	var value = $("#protocolEdit"+devId+" :selected").val();
	$.post("../phplib/protocol.php", {id: devId, protocol: value});
}