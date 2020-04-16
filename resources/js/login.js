document.addEventListener('DOMContentLoaded', () => {

	// ANIMACION FOCUS DIV LOGIN-ID
	document.getElementById('login-id').addEventListener('focusin' ,() => {
		document.getElementsByClassName('login-id')[0].style.backgroundColor = 'rgba(34, 34, 34, .6)';
	});
	document.getElementById('login-id').addEventListener('focusout' ,() => {
		document.getElementsByClassName('login-id')[0].style.backgroundColor = 'rgba(34, 34, 34, .3)';
	});

	// ANIMACION FOCUS DIV LOGIN-PASSWORD
	document.getElementById('login-password').addEventListener('focusin' ,() => {
		document.getElementsByClassName('login-password')[0].style.backgroundColor = 'rgba(34, 34, 34, .6)';
	});
	document.getElementById('login-password').addEventListener('focusout' ,() => {
		document.getElementsByClassName('login-password')[0].style.backgroundColor = 'rgba(34, 34, 34, .3)';
	});

});