//autor: Nina Grujic 177/13

function editDetailsScript() {
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

    var bio = document.forms["editDetails"]["shortBio"].value;
    var hobbies = document.forms["editDetails"]["Hobbies"].value;
	var likes = document.forms["editDetails"]["Likes"].value;
	var dislikes = document.forms["editDetails"]["Dislikes"].value;

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

	var firstDate = document.forms["editDetails"]["PerfFirstDate"].value;
	var favQuote = document.forms["editDetails"]["FavQuote"].value;
	var favSong = document.forms["editDetails"]["FavSong"].value;
	var longestRel = document.forms["editDetails"]["LongestRel"].value;
	var bestQuality = document.forms["editDetails"]["BestQuality"].value;
	var worstQuality = document.forms["editDetails"]["WorstQuality"].value;

	if (firstDate.length > 160) {
		proslo = false;
		document.getElementById("greskaDate").style.display = "inherit";
		document.getElementById("firstDate").style.border = "1px solid #AE0000";
		document.getElementById("dateLabel").innerHTML = "This field must have no more than 160 characters.";
	}
	else {
		document.getElementById("greskaDate").style.display = "none";
		document.getElementById("firstDate").style.border = "";
		document.getElementById("dateLabel").innerHTML = "";
	}

	if (favQuote.length > 160) {
		proslo = false;
		document.getElementById("greskaQuote").style.display = "inherit";
		document.getElementById("favQuote").style.border = "1px solid #AE0000";
		document.getElementById("quoteLabel").innerHTML = "This field must have no more than 160 characters.";
	}
	else {
		document.getElementById("greskaQuote").style.display = "none";
		document.getElementById("favQuote").style.border = "";
		document.getElementById("quoteLabel").innerHTML = "";
	}

	if (favSong.length > 160) {
		proslo = false;
		document.getElementById("greskaSong").style.display = "inherit";
		document.getElementById("favSong").style.border = "1px solid #AE0000";
		document.getElementById("songLabel").innerHTML = "This field must have no more than 160 characters.";
	}
	else {
		document.getElementById("greskaSong").style.display = "none";
		document.getElementById("favSong").style.border = "";
		document.getElementById("songLabel").innerHTML = "";
	}

	if (longestRel.length > 160) {
		proslo = false;
		document.getElementById("greskaLongestRel").style.display = "inherit";
		document.getElementById("longestRel").style.border = "1px solid #AE0000";
		document.getElementById("longestRelLabel").innerHTML = "This field must have no more than 160 characters.";
	}
	else {
		document.getElementById("greskaLongestRel").style.display = "none";
		document.getElementById("longestRel").style.border = "";
		document.getElementById("longestRelLabel").innerHTML = "";
	}

	if (bestQuality.length > 160) {
		document.getElementById("greskaBestQuality").style.display = "inherit";
		document.getElementById("bestQuality").style.border = "1px solid #AE0000";
		document.getElementById("bestQualLabel").innerHTML = "This field must have no more than 160 characters.";
	}
	else {
		document.getElementById("greskaBestQuality").style.display = "none";
		document.getElementById("bestQuality").style.border = "";
		document.getElementById("bestQualLabel").innerHTML = "";
	}

	if (worstQuality.length > 160) {
		document.getElementById("greskaWorstQuality").style.display = "inherit";
		document.getElementById("worstQuality").style.border = "1px solid #AE0000";
		document.getElementById("worstQualLabel").innerHTML = "This field must have no more than 160 characters.";
	}
	else {
		document.getElementById("greskaWorstQuality").style.display = "none";
		document.getElementById("worstQuality").style.border = "";
		document.getElementById("worstQualLabel").innerHTML = "";
	}

    /*if (!document.getElementById("men").checked && !document.getElementById("women").checked) {
		proslo = false;
		document.getElementById("greskaInt").style.display = "inherit";
		document.getElementById("intLabel").innerHTML = "Please select your sexual orientation.";
	}
	else {
		document.getElementById("greskaInt").style.display = "none";
		document.getElementById("intLabel").innerHTML = "";
	} */

	if (firstDate == "" || firstDate == null) {
		document.forms["editDetails"]["PerfFirstDate"].value = "/";
	}

	if (favQuote == "" || favQuote == null) {
		document.forms["editDetails"]["FavQuote"].value = "/";
	}

	if (favSong == "" || favSong == null) {
		document.forms["editDetails"]["FavSong"].value = "/";
	}

	if (longestRel == "" || longestRel == null) {
		document.forms["editDetails"]["LongestRel"].value = "/";
	}

	if (bestQuality == "" || bestQuality == null) {
		document.forms["editDetails"]["BestQuality"].value = "/";
	}

	if (worstQuality == "" || worstQuality == null) {
		document.forms["editDetails"]["WorstQuality"].value = "/";
	}

    return proslo;
}
