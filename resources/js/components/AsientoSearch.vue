<template>
	<form v-on:submit.prevent="searchAsiento()" id="asientos-search">
		<h1>Buscar Asiento</h1>
		<div class="search-id">
			<span class="flaticon-information"></span>
			<input type="number" name="search-id" id="search-id" min="1" max="100" placeholder="Id del Asiento" v-model="id" required>
		</div>
		<p>
			Busque por ID, el Numero de asiento que usted desee.
		</p>
		<input type="submit" value="Buscar">
	</form>
</template>

<script>
import toastr from 'toastr';
import EventBus from '../event_bus';
import { mapState } from 'vuex';

export default {
	name: 'asientos-search',
	data () {
		return {
			id: 0
		}
	},
	methods: {
		searchAsiento () {
			if (this.id > this.totalAsientos) {
				toastr.error('No hay ningun asiento con el numero que has introducido', 'Asiento Inexistente');
			} else {
				EventBus.$emit('searchWorking', this.id);
			}
		}
	},
	computed: {
		...mapState([
			'totalAsientos'
		])
	}
}
</script>