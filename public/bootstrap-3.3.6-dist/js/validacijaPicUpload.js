//aturo: Branislava Ivkovic 125/13

function readURL(){
   	var file = document.getElementById("file").files[0];
  	var reader = new FileReader();
   	reader.onloadend = function(){
   		if (file.name.match(/\.(jpg|jpeg|png|gif|PNG|JPEG|JPG|GIF)$/))
      		document.getElementById('profileImageBox').style.backgroundImage = "url(" + reader.result + ")";
      	else
      		document.getElementById('profileImageBox').style.backgroundImage = "url('../../images/profile_pic.png')";
   	}
   	if(file){
      	reader.readAsDataURL(file);
    }else{
    }
}

function validacija3() {
    var proslo = true;

    var file = document.getElementById("file").files[0];
    var fajlPrazan = false;
    var fajlNekorektan = false;

    if (file == null || file.name == "") {
		fajlPrazan = true;
	}

    if (!fajlPrazan) {
		if (!file.name.match(/\.(jpg|jpeg|png|gif|PNG|JPEG|JPG|GIF)$/))
			fajlNekorektan = true;
	}

    if (fajlPrazan || fajlNekorektan) {
		proslo = false;

		document.getElementById("greskaSlika").style.display = "table-row";
		document.getElementById("profileImageBox").style.border = "1px solid #AE0000";

		if (fajlPrazan)
			document.getElementById("picturelabel").innerHTML = "Please upload your profile picture.";

		if (fajlNekorektan)
			document.getElementById("picturelabel").innerHTML = "You need to select an image file.";
	}
	else {
		document.getElementById("greskaSlika").style.display = "none";
		document.getElementById("picturelabel").innerHTML = "";
		document.getElementById("profileImageBox").style.border = "";
	}

    var korIme = document.forms["signup3"]["username"].value;
    var korImePrazno = false;
    var korImeNekorektno = false;

    if (korIme == null || korIme == "") korImePrazno = true;

    if (!(/^[a-zA-Z0-9_-]{3,16}$/.test(korIme)) && !korImePrazno) korImeNekorektno = true;

    if (korImePrazno || korImeNekorektno) {
        proslo = false;

        document.getElementById("greskaUsername").className = "form-group has-error has-feedback";
        document.getElementById("usernameicon").className = "glyphicon glyphicon-remove form-control-feedback";

		if (korImePrazno)
			document.getElementById("userlabel").innerHTML = "Please choose your username.";

		if (korImeNekorektno)
			document.getElementById("userlabel").innerHTML = "Username can contain letters from 'A' to 'Z', numbers, underscores or hyphens. Username can't contain less than 3 characters or more than 16 characters.";
	}
	else {
		document.getElementById("greskaUsername").className = "form-group";
        document.getElementById("userlabel").innerHTML = "";
        document.getElementById("usernameicon").className = "";
	}

    var lozinka = document.forms["signup3"]["password"].value;
    var lozinkaPrazna = false;
	var lozinkaNekorektna = false;

    if (lozinka == null || lozinka == "") lozinkaPrazna = true;

    if (!(/[A-Z]/.test(lozinka)) || !(/[a-z]/.test(lozinka)) || !(/\d/.test(lozinka)) || !(/[A-Za-z0-9_-]{8,}/.test(lozinka)))
        lozinkaNekorektna = true;

    if (lozinkaPrazna || lozinkaNekorektna) {
		proslo = false;

        document.getElementById("greskaPassword").className = "form-group has-error has-feedback";
        document.getElementById("passwordicon").className = "glyphicon glyphicon-remove form-control-feedback";

		if (lozinkaPrazna)
			document.getElementById("passlabel").innerHTML = "Please choose your password.";

		if (!lozinkaPrazna && lozinkaNekorektna)
			document.getElementById("passlabel").innerHTML = "Password must contain at least 8 characters, at least one number, at least one uppercase letter and at least one lowercase letter. Password can contain only numbers, letters, underscores and hyphens.";
	}
	else {
		document.getElementById("greskaPassword").className = "form-group";
        document.getElementById("passwordicon").className = "";
		document.getElementById("passlabel").innerHTML = "";
	}

    var ponLozinka = document.forms["signup3"]["passrepeat"].value;
    var ponLozinkaPrazno = false;
	var ponLozinkaNekorektno = false;

    if (ponLozinka == null || ponLozinka == "") ponLozinkaPrazno = true;

    if (!(ponLozinka == lozinka) && !ponLozinkaPrazno) ponLozinkaNekorektno = true;

    if (ponLozinkaPrazno || ponLozinkaNekorektno) {
		proslo = false;

		document.getElementById("greskaRepeat").className = "form-group has-error has-feedback";
        document.getElementById("repeaticon").className = "glyphicon glyphicon-remove form-control-feedback";

		if (ponLozinkaPrazno)
			document.getElementById("repeatlabel").innerHTML = "Please confirm your password.";

		if (ponLozinkaNekorektno)
			document.getElementById("repeatlabel").innerHTML = "Your passwords do not match.";
	}
	else {
        document.getElementById("greskaRepeat").className = "form-group";
        document.getElementById("repeaticon").className = "";
		document.getElementById("repeatlabel").innerHTML = "";
	}

	return proslo;
}
