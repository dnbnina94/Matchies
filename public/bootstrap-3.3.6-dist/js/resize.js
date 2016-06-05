//autor: Nina Grujic 177/13

$(window).on('resize', function () {
    var pikseli = $("#slicice").width();
    $("#slicice").css("height", pikseli);
    var pikseli2 = $("#slicice1").width();
    $("#sliciceTablet").css("height", pikseli2);
});

function lol() {
	var pikseli = document.getElementById('slicice').clientWidth;
	document.getElementById('slicice').style.height = pikseli;

	var pikseli2 = document.getElementById('slicice1').clientWidth;
	document.getElementById('sliciceTablet').style.height = pikseli2;
}
