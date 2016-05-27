function ukloniCevap(index) {
	document.getElementsByClassName('moderatorRow')[index].style.display = "none";
	document.getElementsByClassName('moderatorCrta')[index].style.display = "none";
}

function deleteReport(index) {
	document.getElementsByClassName('userRow')[index].style.display = "none";
	document.getElementsByClassName('userCrta')[index].style.display = "none";
}