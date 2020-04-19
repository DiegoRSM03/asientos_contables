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
				<tr v-for="asiento in this.asientos" :key="asiento.id">
					<td colspan="4">{{ asiento.id }}</td>	
				</tr>
				<tr></tr>
			</tbody>
		</table>
	</div>
</template>

<script>
export default {
	name: 'asientos-table',
	props: {
		asientos: Array
	},
	
}
</script>