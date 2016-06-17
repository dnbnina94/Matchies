//autori: Branislava Ivkovic 125/13 i Milena Filipovic 73/13

function validacija() {
    var proslo = true;

    var ime = document.forms["editProfile"]["fname"].value;
    var imePrazno = false;
	var imeDugacko = false;
	var imeNekorektno = false;

    var regex1 = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ðđ]+([ '-]?[[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ðđ]+)*$/;

    if (ime == null || ime == "")
        imePrazno = true;

    if (ime.length > 30)
        imeDugacko = true;

    if (!(regex1.test(ime)) && !imePrazno)
		imeNekorektno = true;

    var prezime = document.forms["editProfile"]["lname"].value;
    var prezimePrazno = false;
	var prezimeDugacko = false;
	var prezimeNekorektno = false;

    if (prezime == null || prezime == "")
        prezimePrazno = true;

    if (prezime.length > 30)
        prezimeDugacko = true;

    if (!(regex1.test(prezime)) && !prezimePrazno)
		prezimeNekorektno = true;

    var email = document.forms["editProfile"]["email"].value;

    var emailPrazan = false;
	var emailNekorektan = false;

	if (email == null || email == "")
		emailPrazan = true;

    if (!(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)) && !emailPrazan)
		emailNekorektan = true;

    var emailAgain = document.forms["editProfile"]["emailAgain"].value;
    var emailAgainPrazan = false;
    var emailAgainNekorektan = false;

    if (emailAgain == null || emailAgain == "")
        emailAgainPrazan = true;

    if (!(email == emailAgain) && !emailAgainPrazan)
		emailAgainNekorektan = true;
/*
    var mesecPrazan = false;
	var danPrazan = false;
	var godinaPrazna = false;
	var danNekorektan = false;
	var ispod18 = false;

    var dan = document.getElementById("day");
    var strDan = dan.options[dan.selectedIndex].value;

    var mesec = document.getElementById("month");
    var strMesec = mesec.options[mesec.selectedIndex].value;

    var godina = document.getElementById("year");
    var strYear = godina.options[godina.selectedIndex].value;

    if (strMesec == "Month")
        mesecPrazan = true;

    if (strDan == "Day")
        danPrazan = true;

    if (strYear == "Year")
        godinaPrazna = true;

    if (!mesecPrazan && !danPrazan && !godinaPrazna && strMesec == "2")
        if (strDan == 29)
            if (!(strYear % 400 == 0 || (strYear % 100 != 0 && strYear % 4 == 0)))
                danNekorektan = true;

    if (!mesecPrazan && !danPrazan && !godinaPrazna && !danNekorektan) {

        var today = new Date();

        if (strYear == (today.getFullYear()-18)) {
            if (strMesec > (today.getMonth()+1)) {
                ispod18 = true;
            }

            if (strMesec == (today.getMonth()+1) && strDan > today.getDate()) {
                ispod18 = true;
            }
        }
    }
*/
    var pol = false;

    if (!document.getElementById("genderMale").checked && !document.getElementById("genderFemale").checked)
        pol = true;

    if (imeNekorektno || imeDugacko || imePrazno || prezimeNekorektno || prezimeDugacko || prezimePrazno) {
		proslo = false;

		if (imeNekorektno || imeDugacko || imePrazno) {

            document.getElementById("greske1").className = "form-group has-error has-feedback";
            document.getElementById("fnameicon").className = "glyphicon glyphicon-remove form-control-feedback";

			if (imePrazno) {
				document.getElementById("flabel").innerHTML = "Please enter your first name.";
			}
			if (imeDugacko) {
				document.getElementById("flabel").innerHTML = "First name must contain 30 or less characters.";
			}
			if (imeNekorektno) {
				document.getElementById("flabel").innerHTML = "First name contains certain characters or numbers that aren't allowed.";
			}
		}
		else {
			document.getElementById("flabel").innerHTML = "";
			document.getElementById("greske1").className = "form-group";
			document.getElementById("fnameicon").className ="";
		}

        if (prezimeNekorektno || prezimeDugacko || prezimePrazno) {

            document.getElementById("greske2").className = "form-group has-error has-feedback";
            document.getElementById("lnameicon").className = "glyphicon glyphicon-remove form-control-feedback";

			if (prezimePrazno) {
				document.getElementById("llabel").innerHTML = "Please enter your last name.";
			}
			if (prezimeDugacko) {
				document.getElementById("llabel").innerHTML = "Last name must contain 30 or less characters.";
			}
			if (prezimeNekorektno) {
				document.getElementById("llabel").innerHTML = "Last name contains certain characters or numbers that aren't allowed.";
			}
		}
        else {
            document.getElementById("llabel").innerHTML = "";
            document.getElementById("greske2").className = "form-group";
            document.getElementById("lnameicon").className ="";
        }
    }
    else {
		document.getElementById("greske1").className = "form-group";
		document.getElementById("flabel").innerHTML = "";
		document.getElementById("fnameicon").className = "";
		document.getElementById("llabel").innerHTML = "";
		document.getElementById("lnameicon").className = "";
	}

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

   /* if (mesecPrazan || danPrazan || godinaPrazna || danNekorektan || ispod18) {
        proslo = false;
        document.getElementById("greske5").style.display = "inherit";

        if (mesecPrazan || danPrazan || godinaPrazna) {
			document.getElementById("datelabel").innerHTML = "Please enter your date of birth.";
			if (mesecPrazan)
				document.getElementById("month").style.border = "1px solid #AE0000";
			else
				document.getElementById("month").style.border = "";
			if (danPrazan)
				document.getElementById("day").style.border = "1px solid #AE0000";
			else
				document.getElementById("day").style.border = "";
			if (godinaPrazna)
				document.getElementById("year").style.border = "1px solid #AE0000";
			else
				document.getElementById("year").style.border = "";
        }
        else {
            if (danNekorektan) {
                document.getElementById("datelabel").innerHTML = "Please enter a valid date of birth.";
                document.getElementById("day").style.border = "1px solid #AE0000";
				document.getElementById("month").style.border = "1px solid #AE0000";
				document.getElementById("year").style.border = "1px solid #AE0000";
            }
            else {
                if (ispod18) {
                    document.getElementById("datelabel").innerHTML = "You must be at least 18 years old.";
					document.getElementById("day").style.border = "1px solid #AE0000";
					document.getElementById("month").style.border = "1px solid #AE0000";
					document.getElementById("year").style.border = "1px solid #AE0000";
                }
                else {
                    document.getElementById("datelabel").innerHTML = "";
					document.getElementById("day").style.border = "";
					document.getElementById("month").style.border = "";
					document.getElementById("year").style.border = "";
                }
            }
        }
    }
    else {
        document.getElementById("datelabel").innerHTML = "";
        document.getElementById("day").style.border = "";
        document.getElementById("month").style.border = "";
        document.getElementById("year").style.border = "";
    }*/

    if (pol) {
        proslo = false;
        document.getElementById("greske6").style.display = "inherit";
        document.getElementById("genderlabel").innerHTML = "Please select your gender.";
    }
    else {
        document.getElementById("greske6").style.display = "";
        document.getElementById("genderlabel").innerHTML = "";
    }

    return proslo;

}

function bla() {


    var myJson = {
        "month": [
            {
                "name" : "January",
                "id" : "1",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    },
                    {
                        "name": "31",
                        "id" : "31"
                    }
                ]
            },
            {
                "name" : "February",
                "id" : "2",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    }
                ]
            },
            {
                "name" : "March",
                "id" : "3",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    },
                    {
                        "name": "31",
                        "id" : "31"
                    }
                ]
            },
            {
                "name" : "April",
                "id" : "4",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    }
                ]
            },
            {
                "name" : "May",
                "id" : "5",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    },
                    {
                        "name": "31",
                        "id" : "31"
                    }
                ]
            },
            {
                "name" : "June",
                "id" : "6",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    }
                ]
            },
            {
                "name" : "July",
                "id" : "7",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    },
                    {
                        "name": "31",
                        "id" : "31"
                    }
                ]
            },
            {
                "name" : "August",
                "id" : "8",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    },
                    {
                        "name": "31",
                        "id" : "31"
                    }
                ]
            },
            {
                "name" : "September",
                "id" : "9",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    }
                ]
            },
            {
                "name" : "October",
                "id" : "10",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    },
                    {
                        "name": "31",
                        "id" : "31"
                    }
                ]
            },
            {
                "name" : "November",
                "id" : "11",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    }
                ]
            },
            {
                "name" : "December",
                "id" : "12",
                "days" : [
                    {
                        "name": "1",
                        "id" : "1"
                    },
                    {
                        "name": "2",
                        "id" : "2"
                    },
                    {
                        "name": "3",
                        "id" : "3"
                    },
                    {
                        "name": "4",
                        "id" : "4"
                    },
                    {
                        "name": "5",
                        "id" : "5"
                    },
                    {
                        "name": "6",
                        "id" : "6"
                    },
                    {
                        "name": "7",
                        "id" : "7"
                    },
                    {
                        "name": "8",
                        "id" : "8"
                    },
                    {
                        "name": "9",
                        "id" : "9"
                    },
                    {
                        "name": "10",
                        "id" : "10"
                    },
                    {
                        "name": "11",
                        "id" : "11"
                    },
                    {
                        "name": "12",
                        "id" : "12"
                    },
                    {
                        "name": "13",
                        "id" : "13"
                    },
                    {
                        "name": "14",
                        "id" : "14"
                    },
                    {
                        "name": "15",
                        "id" : "15"
                    },
                    {
                        "name": "16",
                        "id" : "16"
                    },
                    {
                        "name": "17",
                        "id" : "17"
                    },
                    {
                        "name": "18",
                        "id" : "18"
                    },
                    {
                        "name": "19",
                        "id" : "19"
                    },
                    {
                        "name": "20",
                        "id" : "20"
                    },
                    {
                        "name": "21",
                        "id" : "21"
                    },
                    {
                        "name": "22",
                        "id" : "22"
                    },
                    {
                        "name": "23",
                        "id" : "23"
                    },
                    {
                        "name": "24",
                        "id" : "24"
                    },
                    {
                        "name": "25",
                        "id" : "25"
                    },
                    {
                        "name": "26",
                        "id" : "26"
                    },
                    {
                        "name": "27",
                        "id" : "27"
                    },
                    {
                        "name": "28",
                        "id" : "28"
                    },
                    {
                        "name": "29",
                        "id" : "29"
                    },
                    {
                        "name": "30",
                        "id" : "30"
                    },
                    {
                        "name": "31",
                        "id" : "31"
                    }
                ]
            }
        ]
    }

    $.each(myJson.month, function(index, value) {
           $('#month').append('<option value="' + value.id + '">' + value.name + '</option>');
    });

    $('#month').on('change', function() {
        console.log($(this).val());
        for(var i = 0; i < myJson.month.length; i++)
        {
            if(myJson.month[i].id == $(this).val())
                {
                    $('#day').html('<option value="Day" disabled selected>Day</option>');
    				$.each(myJson.month[i].days, function (index, value) {
    				        $("#day").append('<option value="'+value.id+'">'+value.name+'</option>');
    				});
                }
        }
    });
}

function validacija3() {
    var proslo = true;

    var currentPassword = document.forms["promenaLozinke"]["currentPass"].value;
    var currentPasswordPrazno = false;

    if (currentPassword == null || currentPassword == "") currentPasswordPrazno = true;

    if (currentPasswordPrazno) {
        proslo = false;

        document.getElementById("greskaCurrPass").className = "form-group has-error has-feedback";
        document.getElementById("currentPassicon").className = "glyphicon glyphicon-remove form-control-feedback";

        if (currentPasswordPrazno)
            document.getElementById("currentPasslabel").innerHTML = "Please enter your current password.";
    }
    else {
        document.getElementById("greskaCurrPass").className = "form-group";
        document.getElementById("currentPasslabel").innerHTML = "";
        document.getElementById("currentPassicon").className = "";
    }

    var lozinka = document.forms["promenaLozinke"]["password"].value;
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
            document.getElementById("passlabel").innerHTML = "Please choose your new password.";

        if (!lozinkaPrazna && lozinkaNekorektna)
            document.getElementById("passlabel").innerHTML = "Password must contain at least 8 characters, at least one number, at least one uppercase letter and at least one lowercase letter. Password can contain only numbers, letters, underscores and hyphens.";
    }
    else {
        document.getElementById("greskaPassword").className = "form-group";
        document.getElementById("passwordicon").className = "";
        document.getElementById("passlabel").innerHTML = "";
    }

    var ponLozinka = document.forms["promenaLozinke"]["passrepeat"].value;
    var ponLozinkaPrazno = false;
    var ponLozinkaNekorektno = false;

    if (ponLozinka == null || ponLozinka == "") ponLozinkaPrazno = true;

    if (!(ponLozinka == lozinka) && !ponLozinkaPrazno) ponLozinkaNekorektno = true;

    if (ponLozinkaPrazno || ponLozinkaNekorektno) {
        proslo = false;

        document.getElementById("greskaRepeat").className = "form-group has-error has-feedback";
        document.getElementById("repeaticon").className = "glyphicon glyphicon-remove form-control-feedback";

        if (ponLozinkaPrazno)
            document.getElementById("repeatlabel").innerHTML = "Please confirm your new password.";

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

function validacija2() {
    var proslo = true;

    var drzava = document.getElementById("country");
    var strDrzava = drzava.options[drzava.selectedIndex].value;
    var drzavaPrazno = false;

    var grad = document.getElementById("city");
    var strGrad = grad.options[grad.selectedIndex].value;
    var gradPrazno = false;

    if (strDrzava == "selectCountry") {
        drzavaPrazno = true;
    }
    if (strGrad == "selectCity") {
        gradPrazno = true;
    }

    if (drzavaPrazno) {
        proslo = false;
        document.getElementById("greskaDrzava").style.display = "inherit";
        document.getElementById("country").style.border = "1px solid #AE0000";
        document.getElementById("countrylabel").innerHTML = "Please select your country.";
    }
    else {
        document.getElementById("greskaDrzava").style.display = "none";
        document.getElementById("country").style.border = "";
        document.getElementById("countrylabel").innerHTML = "";
    }

    if (gradPrazno) {
        proslo = false;
        document.getElementById("greskaGrad").style.display = "inherit";
        document.getElementById("city").style.border = "1px solid #AE0000";
        document.getElementById("citylabel").innerHTML = "Please select your city.";
    }
    else {
        document.getElementById("greskaGrad").style.display = "none";
        document.getElementById("city").style.border = "";
        document.getElementById("citylabel").innerHTML = "";
    }

    return proslo;
}

function ucitajDrzaveIGradove(selDrzava,selGrad) {
    var myJson = {
        "country": [
            {
                "name": "Serbia",
                "id": "Serbia",
                "cities": [
                    {
                        "name": "Beograd",
                        "id": "Beograd"
                    },
                    {
                        "name": "Novi Sad",
                        "id": "Novi Sad"
                    },
                    {
                        "name": "Subotica",
                        "id": "Subotica"
                    },
                    {
                        "name": "Kraljevo",
                        "id": "Kraljevo"
                    },
                    {
                        "name": "Uzice",
                        "id": "Uzice"
                    },
                    {
                        "name": "Лопатањ",
                        "id": "Лопатањ"
                    },
                    {
                        "name": "Kruševac",
                        "id": "Kruševac"
                    }
                ]
            },
            {
                "name": "Germany",
                "id": "Germany",
                "cities": [
                    {
                        "name": "Berlin",
                        "id": "Berlin"
                    },
                    {
                        "name": "Ulm",
                        "id": "Ulm"
                    },
                    {
                        "name": "Munich",
                        "id": "Munich"
                    },
                    {
                        "name": "Stuttgart",
                        "id": "Stuttgart"
                    }
                ]
            }
        ]
    }

    $.each(myJson.country, function (index, value) {
        if (selDrzava == value.name) {
            $("#country").append('<option value="'+value.id+'" selected>'+value.name+'</option>');


            $('#city').html('<option value="selectCity" disabled>Your city</option>');
            $.each(myJson.country[index].cities, function (index1, value1) {
                if (selGrad == value1.name)
                    $("#city").append('<option value="'+value1.id+'" selected>'+value1.name+'</option>');
                else
                    $("#city").append('<option value="'+value1.id+'">'+value1.name+'</option>');
            });
        }
        else
            $("#country").append('<option value="'+value.id+'">'+value.name+'</option>');
    });

    $('#country').on('change', function(){
        console.log($(this).val());
        for(var i = 0; i < myJson.country.length; i++)
        {
          if(myJson.country[i].id == $(this).val())
          {
             $('#city').html('<option value="selectCity" disabled selected>Your city</option>');
             $.each(myJson.country[i].cities, function (index, value) {
                $("#city").append('<option value="'+value.id+'">'+value.name+'</option>');
            });
          }
        }
    });
}
