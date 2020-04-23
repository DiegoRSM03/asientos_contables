<template>
	<tr :id="'asiento-row-' + rowId">
		<td class="code"><p v-show="id != 0"> {{ id }} </p></td>
		<td class="account-debe" v-on:click="block('debe', 'haber')">
			<select v-model="id" name="new-debe" :id="'new-debe-' + rowId" class="account-debe-value">
				<option selected disabled>Cuenta</option>
				<option v-for="account in accounts" :key="account.id" :value="account.id">{{ account.name }}</option>
			</select>
		</td>
		<td class="account-haber" v-on:click="block('haber', 'debe')">
			<select v-model="id" name="new-haber" :id="'new-haber-' + rowId" class="account-haber-value" hidden>
				<option selected disabled>Cuenta</option>
				<option v-for="account in accounts" :key="account.id" :value="account.id">{{ account.name }}</option>
			</select>
		</td>
		<td class="number-debe">
			<input type="number" name="number-debe-mount" class="number-debe-mount" :id="'number-debe-mount-' + rowId" min="1" max="999999" placeholder="Monto $">
		</td>
		<td class="number-haber">
			<input type="number" name="number-haber-mount" class="number-haber-mount" :id="'number-haber-mount-' + rowId" min="1" max="999999" placeholder="Monto $" hidden>
		</td>
	</tr>
</template>

<script>
import axios from 'axios';
import EventBus from '../event_bus.js';

export default {
	name: 'asiento-row',
	data () {
		return {
			id: 0,
			accounts: [],
			haberBlocked: true
		}
	},
	props: {
		rowId: Number
	},
	methods: {
		getAccounts () {
			axios.get('/accounts').then(response => {
				this.accounts = response.data;
			});
		},
		block (who, wich) {
			document.getElementById('new-' + who + '-' + this.rowId).hidden = false;
			document.getElementById('new-' + wich + '-' + this.rowId).hidden = true;

			document.getElementById('number-' + who + '-mount-' + this.rowId).hidden = false;
			document.getElementById('number-' + wich + '-mount-' + this.rowId).hidden = true;
		}
	},
	created () {
		this.getAccounts();
		EventBus.$on('newAsientoAdded', () => {
			document.getElementById('new-debe-' + this.rowId).value = null;
			document.getElementById('new-haber-' + this.rowId).value = null;

			document.getElementById('number-debe-mount-' + this.rowId).value = "";
			document.getElementById('number-haber-mount-' + this.rowId).value = "";
		});
	}
}
</script>