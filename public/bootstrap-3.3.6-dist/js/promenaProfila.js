function promeniOk() {
	document.getElementById('dijalog').style.display = "table";
	document.getElementById('dijalog').style.width = "100%";
	document.getElementById('alertMessage').innerHTML = "<span class='glyphicon glyphicon-ok' style='font-size: 150px; color: #298A08'></span>";

	window.setTimeout( function () {

	document.getElementById('dijalog').style.display = "none";

	document.getElementById('levoIme').innerHTML = "<a href='profile1.html' class='linkToProfile'>Stefan Tubic, 24, <i class='fa fa-mars'></i></a>";
	document.getElementById('desnoUsername').innerHTML = "<a href='profile1.html' class='linkToProfile'>@Tubke91</a>";

	document.getElementById('UserBio').innerHTML = "Cao ja sam Stefan, asistent sam na Elektrotehnickom fakultetu u Beogradu ;). Imam devojku ali sam raspolozen za druzenje.";
	document.getElementById('UserEduStatusCol').innerHTML = "Masters degree";
	document.getElementById('UserLikesCol').innerHTML = "Volim lepe i pametne devojke, sve ostalo je nebitno ;)";
	document.getElementById('UserDislikesCol').innerHTML = "Ako nisi lepa i pametna, nemoj mi se javljati.";
	document.getElementById('UserHobbiesCol').innerHTML = "Volim da se dopisujem sa lepim i pametnim devojkama u slobodno vreme ;)";
	document.getElementById('UserWorkCol').innerHTML = "Teacher";
	document.getElementById('UserFirstDateCol').innerHTML = "Odlazak na picence za pocetak ;)";
	document.getElementById('UserFavQuoteCol').innerHTML = "/";
	document.getElementById('UserFavSongCol').innerHTML = "/";
	document.getElementById('UserBestQualCol').innerHTML = "Pametan i lep.";
	document.getElementById('UserWorstQualCol').innerHTML = "Narcisoidan";
	document.getElementById('UserLongestRelCol').innerHTML = "1 year";

	}, 1000);
}

function promeniRemove() {
	document.getElementById('dijalog').style.display = "table";
	document.getElementById('dijalog').style.width = "100%";
	document.getElementById('alertMessage').innerHTML = "<span class='glyphicon glyphicon-remove' style='font-size: 150px; color: #AE0000'></span>";

	window.setTimeout( function() {

	document.getElementById('dijalog').style.display = "none";

	document.getElementById('levoIme').innerHTML = "<a href='profile1.html' class='linkToProfile'>Stefan Tubic, 24, <i class='fa fa-mars'></i></a>";
	document.getElementById('desnoUsername').innerHTML = "<a href='profile1.html' class='linkToProfile'>@Tubke91</a>";

	document.getElementById('UserBio').innerHTML = "Cao ja sam Stefan, asistent sam na Elektrotehnickom fakultetu u Beogradu ;). Imam devojku ali sam raspolozen za druzenje.";
	document.getElementById('UserEduStatusCol').innerHTML = "Masters degree";
	document.getElementById('UserLikesCol').innerHTML = "Volim lepe i pametne devojke, sve ostalo je nebitno ;)";
	document.getElementById('UserDislikesCol').innerHTML = "Ako nisi lepa i pametna, nemoj mi se javljati.";
	document.getElementById('UserHobbiesCol').innerHTML = "Volim da se dopisujem sa lepim i pametnim devojkama u slobodno vreme ;)";
	document.getElementById('UserWorkCol').innerHTML = "Teacher";
	document.getElementById('UserFirstDateCol').innerHTML = "Odlazak na picence za pocetak ;)";
	document.getElementById('UserFavQuoteCol').innerHTML = "/";
	document.getElementById('UserFavSongCol').innerHTML = "/";
	document.getElementById('UserBestQualCol').innerHTML = "Pametan i lep.";
	document.getElementById('UserWorstQualCol').innerHTML = "Narcisoidan";
	document.getElementById('UserLongestRelCol').innerHTML = "1 year";

	}, 1000);
}