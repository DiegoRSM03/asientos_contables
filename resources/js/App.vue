<template>
	<div id="asientos">
		<div id="asientos-forms">
			<asientos-new></asientos-new>
			<asientos-search></asientos-search>
		</div>
		<asientos-table></asientos-table>
	</div>
</template>

<script>
import store from './store.js';
import AsientoNew from './components/AsientoNew.vue';
import AsientoSearch from './components/AsientoSearch.vue';
import AsientosTable from './components/AsientosTable.vue';

export default {
	name: 'app',
	store,
	components: {
		'asientos-new': AsientoNew,
		'asientos-search': AsientoSearch,
		'asientos-table': AsientosTable
	}
}
</script>