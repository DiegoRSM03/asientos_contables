import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		totalAsientos: 0,
		asientoNew: {
			id: 0,
			date: '',
			description: '',
			debe: '',
			haber: '',
			debe_mount: '',
			haber_mount: ''
		},
		asientoSeach: {
			id: 0,
			orderBy: ''
		}
	},
	mutations: {
		setTotalAsientos (state, asientos) {
			state.totalAsientos = asientos
		}
	},
	actions: {
		getTotalAsientos ({ commit }) {
			axios.get('/asientos/total').then(response => {
				commit('setTotalAsientos', response.data)
			});
		}
	}
});