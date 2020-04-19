<template>
	<div id="asientos-table">
		<table>
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Descripcion</th>
					<th>Debe</th>
					<th>Haber</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="asiento in asientos" :key="asiento.id">
					<td colspan="4">{{ asiento.id }}</td>	
				</tr>
				<tr></tr>
			</tbody>
		</table>
	</div>
</template>

<script>
import axios from 'axios';

export default {
	name: 'asientos-table',
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