function validacijaModerator() {
	var proslo = true;

	var email = document.forms["newModerator"]["email"].value;
    
    var emailPrazan = false;
	var emailNekorektan = false;

	if (email == null || email == "") 
		emailPrazan = true;
    
    if (!(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)) && !emailPrazan)
		emailNekorektan = true;

	var emailAgain = document.forms["newModerator"]["emailAgain"].value;
    var emailAgainPrazan = false;
    var emailAgainNekorektan = false;
    
    if (emailAgain == null || emailAgain == "")
        emailAgainPrazan = true;

    if (!(email == emailAgain) && !emailAgainPrazan)
		emailAgainNekorektan = true;

	if (emailPrazan || emailNekorektan || emailAgainPrazan || emailAgainNekorektan) {
        proslo = false;
        
        if (emailPrazan || emailNekorektan) {
            document.getElementById("greske3").className = "form-group has-error has-feedback";
            document.getElementById("emailicon").className = "glyphicon glyphicon-remove form-control-feedback";
            
            if (emailPrazan) {
                document.getElementById("elabel").innerHTML = "Please enter your email address.";
            }
            if (emailNekorektan) {
                document.getElementById("elabel").innerHTML = "Please enter a valid email address."
            }
        }
        else {
            document.getElementById("greske3").className = "form-group";
            document.getElementById("elabel").innerHTML = "";
            document.getElementById("emailicon").className = "";
        }
        
        if (emailAgainPrazan || emailAgainNekorektan) {
            document.getElementById("greske4").className = "form-group has-error has-feedback";
            document.getElementById("emailagainicon").className = "glyphicon glyphicon-remove form-control-feedback";
            
            if (emailAgainPrazan) {
                document.getElementById("ealabel").innerHTML = "Please confirm your email address.";
            }
            if (emailAgainNekorektan) {
                document.getElementById("ealabel").innerHTML = "Your emails do not match."
            }
        }
        else {
            document.getElementById("greske4").className = "form-group";
            document.getElementById("ealabel").innerHTML = "";
            document.getElementById("emailagainicon").className = "";
        }
    }
    else {
        document.getElementById("greske3").className = "form-group";
        document.getElementById("greske4").className = "form-group";
		document.getElementById("elabel").innerHTML = "";
		document.getElementById("emailicon").className = "";
		document.getElementById("ealabel").innerHTML = "";
		document.getElementById("emailagainicon").className = "";
    }

    var korIme = document.forms["newModerator"]["username"].value;
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

    var lozinka = document.forms["newModerator"]["password"].value;
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
    
    var ponLozinka = document.forms["newModerator"]["passrepeat"].value;
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