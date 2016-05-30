var slFem;
var slM;
var slG;

function ucitaj(){
var sliderage = new Slider('#ageslider', {});
var slidermale = new Slider('#maleslider', {});
var sliderfemale = new Slider('#femaleslider', {});
slFem = sliderfemale;
slM = slidermale;
slG = sliderage;
}

function odradi() {
	var proslo = false;
	return proslo;
}

function promeni(pol,godine) {
	if (pol == "ff") {
		$('#pokaziPol').html("Women");
		slFem.setValue(1);
		slM.setValue(0);
		document.getElementById("Gender").value = "Women";
	}
	if (pol == "mm") {
		$('#pokaziPol').html("Men");
		slFem.setValue(0);
		slM.setValue(1);
		document.getElementById("Gender").value = "Men";
	}
	if (pol == "fm") {
		$('#pokaziPol').html("Men and Women");
		slFem.setValue(1);
		slM.setValue(1);
		document.getElementById("Gender").value = "Men and Women";
	}

	var godinePomoc = godine.split(" ");
	var godinePomoc2 = godinePomoc[0].split("-");
	var godina = Number(godinePomoc2[0]);
	var mesec = Number(godinePomoc2[1]);
	var dan = Number(godinePomoc2[2]);
	var today = new Date();
	var minAge;
	var maxAge;
	var age = today.getFullYear() - godina;

	if ((today.getMonth() - mesec) < 0 || ((today.getMonth() - mesec) === 0 && today.getDate() < dan)) {
        age--;
    }

    var age2 = age+5;

    if (age > 80)
    	age = 80;
    if (age2 > 80) {
    	age2 = 80;
		$('#pokaziGodine').html(age+"-"+age2+"+");
	}
	else
		$('#pokaziGodine').html(age+"-"+age2);

	var niz = new Array();
	niz[0] = age;
	niz[1] = age2;

	document.getElementById("AgeMin").value = age;
	document.getElementById("AgeMax").value = age2;

	slG
    .setValue(niz);
}