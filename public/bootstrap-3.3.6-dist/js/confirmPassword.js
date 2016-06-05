//autor: Nina Grujic 177/13

function confirmPass() {
	var proslo = true;

	var password = document.forms["deleteAccount"]["currentPass"].value;

	if (password == null || password == "") {
		proslo = false;
		document.getElementById("greskaCurrPass").className = "form-group has-error has-feedback";
        document.getElementById("currentPassicon").className = "glyphicon glyphicon-remove form-control-feedback";
        document.getElementById("currentPasslabel").innerHTML = "Please enter your password.";
	}
	else {
		document.getElementById("greskaCurrPass").className = "form-group";
        document.getElementById("currentPasslabel").innerHTML = "";
        document.getElementById("currentPassicon").className = "";
	}

	return proslo;
}
