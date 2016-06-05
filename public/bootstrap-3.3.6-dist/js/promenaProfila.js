//autor: Nina Grujic 177/13

function promeniOk() {
	document.getElementById('dijalog').style.display = "table";
	document.getElementById('dijalog').style.width = "100%";
	document.getElementById('alertMessage').innerHTML = "<span class='glyphicon glyphicon-ok' style='font-size: 150px; color: #298A08'></span>";
}

function promeniRemove() {
	document.getElementById('dijalog').style.display = "table";
	document.getElementById('dijalog').style.width = "100%";
	document.getElementById('alertMessage').innerHTML = "<span class='glyphicon glyphicon-remove' style='font-size: 150px; color: #AE0000'></span>";
}
