<template>
	<form v-on:submit.prevent="saveNewAsiento()" id="asientos-new">
		<h1>Añadir Asiento</h1>
		<div class="container-id-date">
			<div class="new-id">
				<span class="flaticon-information"></span>
				<p>Numero {{ totalAsientos+1 }} </p>
			</div>
			<div class="new-date">
				<span class="flaticon-calendar"></span>
				<input v-model="asientoNew.date" type="date" name="new-date" id="new-date" min="2020-04-01" max="2025-04-01" required>
			</div>
		</div>
		<div class="new-description">
			<span class="flaticon-edit"></span>
			<input v-model="asientoNew.description" type="text" name="new-description" id="new-description" min="1" max="100" placeholder="Descripcion del asiento" required>
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
				<asiento-row :rowId="1"></asiento-row>
				<asiento-row :rowId="2"></asiento-row>
				<asiento-row :rowId="3" hidden></asiento-row>
				<asiento-row :rowId="4" hidden></asiento-row>
				<asiento-row :rowId="5" hidden></asiento-row>
				<asiento-row :rowId="6" hidden></asiento-row>
				<asiento-row :rowId="7" hidden></asiento-row>
				<asiento-row :rowId="8" hidden></asiento-row>
				<asiento-row :rowId="9" hidden></asiento-row>
				<asiento-row :rowId="10" hidden></asiento-row>
				<tr class="adder">
					<td colspan="5" @click="newAsiento()" id="adder">
						<div><span class="flaticon-plus"></span>Nuevo</div>
					</td>
				</tr>
			</tbody>
		</table>
		<input type="submit" value="Añadir" id="save-new-asiento">
	</form>
</template>

<script>
import axios from 'axios';
import toastr from 'toastr';
import AsientoRow from './AsientoRow';
import { mapState, mapActions } from 'vuex';

var rowIdShow = 2;

export default {
	name: 'asientos-new',
	components: {
		'asiento-row': AsientoRow
	},
	methods: {
		...mapActions([
			'getTotalAsientos'
		]),
		setId () {
			this.rowId++;
			return this.rowId;
		},
		newAsiento () {
			rowIdShow++;
			document.getElementById('asiento-row-' + rowIdShow).hidden = false;
		},
		setDebeHaber (arrayElements) {
			let stringContainer = '';
			for (let i=0 ; i<arrayElements.length ; i++) {
				let element = arrayElements[i];
				if (element.value != null && element.value != '' && element.value != '0' && element.hidden == false) {
					stringContainer += element.value + ',';
				}
			}
			return stringContainer.substr(0, stringContainer.length-1);
		},
		saveNewAsiento () {
			let debeString = document.getElementsByClassName('account-debe-value');
			let haberString = document.getElementsByClassName('account-haber-value');
			let debeMountString = document.getElementsByClassName('number-debe-mount');
			let haberMountString = document.getElementsByClassName('number-haber-mount');
			
			let debe = this.setDebeHaber(debeString);
			let haber = this.setDebeHaber(haberString);
			let debeMount = this.setDebeHaber(debeMountString);
			let haberMount = this.setDebeHaber(haberMountString);

			axios
				.post('/asientos', {
					id: this.totalAsientos + 1,
					date: this.asientoNew.date,
					description: this.asientoNew.description,
					debe: debe,
					haber: haber,
					debe_mount: debeMount,
					haber_mount: haberMount
				})
				.then(response => response.data)
				.then(data => {
					if (data.status = 'successful') {
						toastr.success(`Su asiento fue añadido con el numero ${this.totalAsientos + 1}, lo puede ver mas abajo.`, 'Asiento añadido con éxito')
					} else {
						toastr.error('Ocurrio un error al agregar el asiento')
					}
				})
		}
	},
	computed: {
		...mapState([
			'totalAsientos',
			'asientoNew'
		])
	},
	mounted () {
		this.getTotalAsientos();
	}
}
</script>