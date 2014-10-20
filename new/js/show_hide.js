function show(str) {
	document.getElementById(str).style.display = "block";
}

function hide(str) {
	document.getElementById(str).style.display = "none";
}

function hide_delay(str) {
	var fun = "hide(\"" + str + "\")";
	setTimeout(fun, 4000);
}