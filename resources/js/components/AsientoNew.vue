<template>
	<form id="asientos-new">
		<h1>Añadir Asiento</h1>
		<div class="container-id-date">
			<div class="new-id">
				<span class="flaticon-information"></span>
				<input v-model="id" type="number" name="new-id" id="new-id" min="1" max="100" placeholder="Id del Asiento" required>
			</div>
			<div class="new-date">
				<span class="flaticon-calendar"></span>
				<input v-model="date" type="date" name="new-date" id="new-date" min="2020-04-01" max="2025-04-01" required>
			</div>
		</div>
		<div class="new-description">
			<span class="flaticon-edit"></span>
			<input v-model="description" type="text" name="new-description" id="new-description" min="1" max="100" placeholder="Descripcion del asiento" required>
		</div>
		<table class="container-table">
			<thead>
				<tr>
					<th>Codigo</th>
					<th colspan="2">Cuenta</th>
					<th>Debe</th>
					<th>Haber</th>
				</tr>
			</thead>
			<tbody id="tbody">
				<asiento-row :rowId="setId()"></asiento-row>
				<asiento-row :rowId="setId()"></asiento-row>
				<asiento-row :rowId="setId()" hidden></asiento-row>
				<asiento-row :rowId="setId()" hidden></asiento-row>
				<asiento-row :rowId="setId()" hidden></asiento-row>
				<asiento-row :rowId="setId()" hidden></asiento-row>
				<asiento-row :rowId="setId()" hidden></asiento-row>
				<asiento-row :rowId="setId()" hidden></asiento-row>
				<asiento-row :rowId="setId()" hidden></asiento-row>
				<asiento-row :rowId="setId()" hidden></asiento-row>
				<tr class="adder">
					<td colspan="5" @click="newAsiento()" id="adder">
						<div><span class="flaticon-plus"></span>Nuevo</div>
					</td>
				</tr>
			</tbody>
		</table>
		<input type="submit" value="Añadir">
	</form>
</template>

<script>
import toastr from 'toastr';
import AsientoRow from './AsientoRow';
var rowId = 0;
var rowIdShow = 2;

export default {
	name: 'asientos-new',
	components: {
		'asiento-row': AsientoRow
	},
	data () {
		return {
			id: '',
			date: '',
			description: '',
			debe: '',
			haber: '',
			debe_mount: '',
			haber_mount: ''
		}
	},
	methods: {
		setId () {
			rowId++;
			return rowId;
		},
		newAsiento () {
			rowIdShow++;
			document.getElementById('asiento-row-' + rowIdShow).hidden = false;
		}
	}
}
</script>