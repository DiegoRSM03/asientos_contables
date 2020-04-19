import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		totalAsientos: 0
	},
	getters: {

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