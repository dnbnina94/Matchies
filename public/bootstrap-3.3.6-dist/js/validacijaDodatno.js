function validacija4() {
    var proslo = true;
    
    var relStatus = document.getElementById("relationship");
    var strRel = relStatus.options[relStatus.selectedIndex].value;
    var eduStatus = document.getElementById("education");
    var strEdu = eduStatus.options[eduStatus.selectedIndex].value;
    
    var relPrazno = false;
	var eduPrazno = false;

    if (strRel == "Status") relPrazno = true;

    if (strEdu == "edStatus") eduPrazno = true;
    
    if (relPrazno || eduPrazno) {
		proslo = false;
        
		if (relPrazno) {
            document.getElementById("greskaRel").style.display = "inherit";
			document.getElementById("relationship").style.border = "1px solid #AE0000";
			document.getElementById("relLabel").innerHTML = "Please select your relationship status.";
		}
		else {
            document.getElementById("greskaRel").style.display = "none";
			document.getElementById("relationship").style.border = "";
			document.getElementById("relLabel").innerHTML = "";
		}
        
		if (eduPrazno) {
            document.getElementById("greskaEdu").style.display = "inherit";
			document.getElementById("education").style.border = "1px solid #AE0000";
			document.getElementById("eduLabel").innerHTML = "Please select your education level.";
		}
		else {
            document.getElementById("greskaEdu").style.display = "none";
			document.getElementById("education").style.border = "";
			document.getElementById("eduLabel").innerHTML = "";
		}
	}
	else {
		document.getElementById("greskaEdu").style.display = "none";
        document.getElementById("greskaRel").style.display = "none";
		document.getElementById("relationship").style.border = "";
		document.getElementById("education").style.border = "";
		document.getElementById("eduLabel").innerHTML = "";
		document.getElementById("relLabel").innerHTML = "";
	}

    var bio = document.forms["signup4"]["shortBio"].value;
    var hobbies = document.forms["signup4"]["Hobbies"].value;
	var likes = document.forms["signup4"]["Likes"].value;
	var dislikes = document.forms["signup4"]["Dislikes"].value;
    
    if (bio.length<30 || bio.length>160) {
		proslo = false;
		document.getElementById("greskaBio").style.display = "inherit";
		document.getElementById("bio").style.border = "1px solid #AE0000";
		document.getElementById("bioLabel").innerHTML = "This field must have no less than 30 and no more than 160 characters.";
	}
	else {
		document.getElementById("greskaBio").style.display = "none";
		document.getElementById("bio").style.border = "";
		document.getElementById("bioLabel").innerHTML = "";
	}
    
    if (hobbies.length<30 || hobbies.length>160) {
		proslo = false;
		document.getElementById("greskaHob").style.display = "inherit";
		document.getElementById("hobbies").style.border = "1px solid #AE0000";
		document.getElementById("hobLabel").innerHTML = "This field must have no less than 30 and no more than 160 characters.";
	}
	else {
		document.getElementById("greskaHob").style.display = "none";
		document.getElementById("hobbies").style.border = "";
		document.getElementById("hobLabel").innerHTML = "";
	}
    
    if (likes.length<30 || likes.length>160) {
		proslo = false;
		document.getElementById("greskaLik").style.display = "inherit";
		document.getElementById("likes").style.border = "1px solid #AE0000";
		document.getElementById("likLabel").innerHTML = "This field must have no less than 30 and no more than 160 characters.";
	}
	else {
		document.getElementById("greskaLik").style.display = "none";
		document.getElementById("likes").style.border = "";
		document.getElementById("likLabel").innerHTML = "";
	}
    
    if (dislikes.length<30 || dislikes.length>160) {
		proslo = false;
		document.getElementById("greskaDis").style.display = "inherit";
		document.getElementById("dislikes").style.border = "1px solid #AE0000";
		document.getElementById("disLabel").innerHTML = "This field must have no less than 30 and no more than 160 characters.";
	}
	else {
		document.getElementById("greskaDis").style.display = "none";
		document.getElementById("dislikes").style.border = "";
		document.getElementById("disLabel").innerHTML = "";
	}
    
    if (!document.getElementById("men").checked && !document.getElementById("women").checked) {
		proslo = false;
		document.getElementById("greskaInt").style.display = "inherit";
		document.getElementById("intLabel").innerHTML = "Please select your sexual orientation.";
	}
	else {
		document.getElementById("greskaInt").style.display = "none";
		document.getElementById("intLabel").innerHTML = "";
	}

    return proslo;
}