//autor: Nina Grujic 177/13

function promeniSliku() {
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

		document.getElementById("greskaSlika1").style.display = "table-row";
		document.getElementById("slicice1").style.border = "1px solid #AE0000";
		document.getElementById("slicice").style.border = "1px solid #AE0000";

		if (fajlPrazan)
			document.getElementById("picturelabel1").innerHTML = "Please upload your profile picture.";

		if (fajlNekorektan)
			document.getElementById("picturelabel1").innerHTML = "You need to select an image file.";
	}
	else {
		document.getElementById("greskaSlika1").style.display = "none";
		document.getElementById("picturelabel1").innerHTML = "";
		document.getElementById("slicice1").style.border = "";
		document.getElementById("slicice").style.border = "";
	}

	return proslo;
}

function readURL(){
   	var file = document.getElementById("file").files[0];
  	var reader = new FileReader();
   	reader.onloadend = function(){
   		if (file.name.match(/\.(jpg|jpeg|png|gif|PNG|JPEG|JPG|GIF)$/)) {
      		document.getElementById('slicice1').style.backgroundImage = "url(" + reader.result + ")";
      		document.getElementById('slicice').style.backgroundImage = "url(" + reader.result + ")";
      	}
      	else {
      		document.getElementById('slicice1').style.backgroundImage = "url('../../images/profile_pic.png')";
      		document.getElementById('slicice').style.backgroundImage = "url('../../images/profile_pic.png')";
      	}
   	}
   	if(file){
      	reader.readAsDataURL(file);
    }else{
    }
}
