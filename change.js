
function init()
{
	var registerForm = document.getElementById("registerID");
	registerForm.addEventListener("click",showPopup);
	return false; 
}

// set up validation handlers when page is downloaded and ready
	//window.onload = init;
	document.addEventListener('DOMContentLoaded', init, false);