<template>
	<div id="asientos-table">
		<table>
			<thead>
				<tr>
					<th>Nro</th>
					<th>Fecha</th>
					<th>Descripcion</th>
					<th>Debe</th>
					<th>Haber</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="asiento in asientos" :key="asiento.id">
					<td class="number">{{ asiento.id }}</td>
					<td class="date">
						<p>{{ asiento.date }}</p>
						<p>{{ humanTime(asiento.date) }}</p>
					</td>
					<td class="debe-haber-description">
						<p class="debe" v-for="(debe, i) in asiento.debe" :key="'debe' + i">
							{{ debe }}
						</p>
						<p class="haber" v-for="(haber, i) in asiento.haber" :key="'haber' + i">
							{{ haber }}
						</p>
						<p class="description">{{ asiento.description }}</p>
					</td>
					<td>
						<p :class="'debeMount-' + asiento.id" v-for="(debeMount, i) in asiento.debe_mount" :key="'debe-mount-' + i">
							{{ debeMount }}
						</p>
						<p class="nothing" v-for="(haberMount, i) in asiento.haber_mount" :key="'haber-mount-false-' + i">
							&squf;
						</p>
						<p class="sub-total">{{ getSubTotal(asiento.debe_mount) }}</p>
					</td>
					<td>
						<p class="nothing" v-for="(debeMount, i) in asiento.debe_mount" :key="'debe-mount-false-' + i">
							&squf;
						</p>
						<p :class="'haberMount-' + asiento.id" v-for="(haberMount, i) in asiento.haber_mount" :key="'haber-mount-' + i">
							{{ haberMount }}
						</p>
						<p class="sub-total">{{ getSubTotal(asiento.haber_mount) }}</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<script>
import axios from 'axios';
import EventBus from '../event_bus.js';
import moment from 'moment';
moment.lang('es');

export default {
	name: 'asientos-table',
	data () {
		return {
			asientos: []
		}
	},
	methods: {
		async getAsientos (id = '') {
			let response = await axios.get('/asientos' + id);
			let data = response.data;

			if (id != '') {
				data = Array(data);
			}

			for (const i in data) {
				data[i].debe = data[i].debe.split(',');
				data[i].haber = data[i].haber.split(',');

				data[i].debe_mount = data[i].debe_mount.split(',');
				data[i].haber_mount = data[i].haber_mount.split(',');

				let accountName = '';
				for (const j in data[i].debe) {
					let response1 = await axios.get('/accounts/' + data[i].debe[j]);
					let data1 = response1.data;

					accountName = ': ' + data1.name + ' (' + data1.type + ')';
					data[i].debe[j] += accountName;
				}
				for (const j in data[i].haber) {
					let response2 = await axios.get('/accounts/' + data[i].haber[j]);
					let data2 = response2.data;

					accountName = ': ' + data2.name + ' (' + data2.type + ')';
					data[i].haber[j] += accountName;
				}
			}
			this.asientos = data;
		},
		getSubTotal (arrayMount) {
			let subTotal = 0;
			for (const item in arrayMount) {
				subTotal += parseInt(arrayMount[item]);
			}
			return subTotal;
		},
		humanTime (date) {
			return moment(date).fromNow();
		}
	},
	mounted () {
		this.getAsientos();
		EventBus.$on('newAsientoAdded', () => {
			document.getElementById('new-date').value = null;
			document.getElementById('new-description').value = null;
			this.getAsientos();
		});
		EventBus.$on('searchWorking', id => {
			this.getAsientos(`/${id}`);
		});
	}
	
}
</script>