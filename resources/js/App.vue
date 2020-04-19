<template>
	<div id="asientos">
		<div id="asientos-forms">
			<asientos-new></asientos-new>
			<asientos-search></asientos-search>
		</div>
		<asientos-table :list="this.asientos"></asientos-table>
	</div>
</template>

<script>
import axios from 'axios';
import AsientoNew from './components/AsientoNew.vue';
import AsientoSearch from './components/AsientoSearch.vue';
import AsientosTable from './components/AsientosTable.vue';

export default {
	name: 'app',
	components: {
		'asientos-new': AsientoNew,
		'asientos-search': AsientoSearch,
		'asientos-table': AsientosTable
	},
	data () {
		return {
			asientos: []
		}
	},
	methods: {
		getAsientos () {
			axios.get('/asientos').then(response => {
				this.asientos = response.data
			});
		}
	},
	created () {
		this.getAsientos();
	}
}
</script>