//autori: Nina Grujic 177/13 i Petar Djukic 634/13

function proveriReport() {
	var tekst = document.getElementById("otherreason").value;
	if (document.getElementById("report3").checked && (tekst == "" || tekst == null)) {
		document.getElementById("greskaReport").style.display = "table";
		document.getElementById("greskaReport").innerHTML = "Please write down a reason for warning this user.";
		document.getElementById("otherreason").style.border = "1px solid #AE0000";
		return false;
	}
	return true;
}

function reportKor1() {
	document.getElementById("reportBoxContainer").style.display = "table";
	document.getElementById("user_id_change_password").value = document.getElementById("userId2").value;
}

function reportKor1remove() {
	document.getElementById("reportBoxContainer").style.display = "none";
	document.getElementById("greskaReport").style.display = "none";
	document.getElementById("otherreason").style.border = "none";
}

function deleteKorDisplay() {
	document.getElementById('deleteBoxContainer').style.display = "table";
	document.getElementById("user_id_delete").value = document.getElementById("userId2").value;
}

function deleteKorRemove() {
	document.getElementById('deleteBoxContainer').style.display = "none";
}

function moderatorKorDisplay(username, email) {
	var usernameIspis = '' + username;
	var emailIspis = '' + email;
	document.getElementById('moderatorBoxContainer').style.display = "table";
	document.getElementById('usernameMod').innerHTML = usernameIspis;
	document.getElementById('emailMod').innerHTML = emailIspis;
}

function moderatorKorRemove() {
	document.getElementById('moderatorBoxContainer').style.display = "none";
}

var classElementIndex = null;

function warnKorDisplay(index, idKor, idRep) {
	var idK= ''+idKor;
	var idR = ''+idRep;
	document.getElementById("user_idBox").value = idK;
	document.getElementById("report_idBox").value = idR;
	document.getElementById('reportBoxContainer').style.display = "table";
	classElementIndex = idRep;

}

function proveriWarn() {
	if (classElementIndex == null)
		return false;

	var tekst = document.getElementById("otherreason").value;
	if (document.getElementById("report3").checked && (tekst == "" || tekst == null)) {
		document.getElementById("greskaReport").style.display = "table";
		document.getElementById("greskaReport").innerHTML = "Please write down a reason for warning this user.";
		document.getElementById("otherreason").style.border = "1px solid #AE0000";
		return false;
	}

	document.getElementsByClassName('userRow')[classElementIndex].style.display = "none";
	document.getElementsByClassName('userCrta')[classElementIndex].style.display = "none";
	warnKorRemove();
	return false;
}

function warnKorRemove() {
	document.getElementById('reportBoxContainer').style.display = "none";
}

function deleteReportDisplay(reportId) {
	var idR = ''+reportId;
	document.getElementById('report_id_to_delete').value = idR;
	document.getElementById('deleteBoxContainer').style.display = "table";
}

function deleteReportRemove() {
	if (classElementIndex != null) {
		document.getElementsByClassName('userRow')[classElementIndex].style.display = "none";
		document.getElementsByClassName('userCrta')[classElementIndex].style.display = "none";
		document.getElementById('deleteBoxContainer').style.display = "none";
	}

	return false;
}

function deleteModeratorDisplay(idMod) {
	document.getElementById('moderatorID').value = idMod;
	document.getElementById('deleteBoxContainer').style.display = "table";
}

function deleteModeratorRemove() {
	if (classElementIndex != null) {
		document.getElementsByClassName('moderatorRow')[classElementIndex].style.display = "none";
		document.getElementsByClassName('moderatorCrta')[classElementIndex].style.display = "none";
		document.getElementById('deleteBoxContainer').style.display = "none";
	}

	return false;
}
