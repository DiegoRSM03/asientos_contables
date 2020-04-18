<template>
	<table>
		<thead>
			<tr>
				<th>Fecha</th>
				<th>Descripcion</th>
				<th>Debe</th>
				<th>Haber</th>
			</tr>
		</thead>
		<tbody v-for="i in totalAsientos" v-bind:key="i.id">
			<tr>
				<td colspan="4">{{ i.id }}</td>	
			</tr>
		</tbody>
	</table>
</template>

<script>
const axios = require('axios').default;

export default {
	data: function () {
		return {
			totalAsientos: null
		}
	},
	mounted () {
		axios
			.get('/accounts')
			.then(response => (this.totalAsientos = response.data))
			.then(data => console.log(this.totalAsientos))
	}
}
</script>