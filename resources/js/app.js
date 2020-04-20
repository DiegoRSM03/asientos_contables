document.addEventListener('DOMContentLoaded', () => {

	// ANIMACION FOCUS DIV SEARCH-ID
	document.getElementById('search-id').addEventListener('focusin' ,() => {
		document.getElementsByClassName('search-id')[0].style.backgroundColor = 'rgba(34, 34, 34, .6)';
	});
	document.getElementById('search-id').addEventListener('focusout' ,() => {
		document.getElementsByClassName('search-id')[0].style.backgroundColor = 'rgba(34, 34, 34, .3)';
	});

});

import Vue from 'vue';
import App from './App.vue';

Vue.config.productionTip = false;

new Vue({
	render: h => h(App),
}).$mount('app')