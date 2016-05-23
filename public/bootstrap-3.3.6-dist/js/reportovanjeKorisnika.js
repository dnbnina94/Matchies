function proveriReport() {
	var tekst = document.getElementById("otherreason").value;
	if (document.getElementById("report3").checked && (tekst == "" || tekst == null)) {
		document.getElementById("greskaReport").style.display = "table";
		document.getElementById("greskaReport").innerHTML = "Please write down a reason for reporting this user.";
		document.getElementById("otherreason").style.border = "1px solid #AE0000";
		return false;
	}
	return true;
}

function reportKor1() {
	document.getElementById("reportBoxContainer").style.display = "table";
}

function reportKor1remove() {
	document.getElementById("reportBoxContainer").style.display = "none";
	document.getElementById("greskaReport").style.display = "none";
	document.getElementById("otherreason").style.border = "none";
}