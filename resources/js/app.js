document.addEventListener('DOMContentLoaded', () => {

	// ANIMACION FOCUS DIV SEARCH-ID
	document.getElementById('search-id').addEventListener('focusin' ,() => {
		document.getElementsByClassName('id')[0].style.backgroundColor = 'rgba(34, 34, 34, .6)';
	});
	document.getElementById('search-id').addEventListener('focusout' ,() => {
		document.getElementsByClassName('id')[0].style.backgroundColor = 'rgba(34, 34, 34, .3)';
	});

});