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
		<tbody v-for="i in totalAsientos" v-bind:key="i">
			<tr>
				<td colspan="4">{{ i }}</td>	
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	computed: {
		async totalAsientos () {
			let response = await fetch('/asientos/total')
			let data = await response.json();
			console.log(data);

			return 5;
		}
	}
}
</script>