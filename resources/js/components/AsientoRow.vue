<template>
	<tr id="asiento-row">
		<td class="code"><p v-show="id != 0"> {{ id }} </p></td>
		<td class="account-debe" v-on:click="block('debe', 'haber')">
			<select v-model="id" name="new-debe" id="new-debe">
				<option disabled selected>Cuenta</option>
				<option v-for="account in accounts" :key="account.id" :value="account.id">{{ account.name }}</option>
			</select>
		</td>
		<td class="account-haber" v-on:click="block('haber', 'debe')">
			<select v-model="id" name="new-haber" id="new-haber" hidden>
				<option disabled selected>Cuenta</option>
				<option v-for="account in accounts" :key="account.id" :value="account.id">{{ account.name }}</option>
			</select>
		</td>
		<td class="number-debe">
			<input type="number" name="new-debe-mount" id="new-debe-mount" min="1" max="99999" value="0" required>
		</td>
		<td class="number-haber">
			<input type="number" name="new-haber-mount" id="new-haber-mount" min="1" max="99999" value="0" required hidden>
		</td>
	</tr>
</template>

<script>
import axios from 'axios';

export default {
	name: 'asiento-row',
	data () {
		return {
			id: 0,
			accounts: [],
			haberBlocked: true
		}
	},
	methods: {
		getAccounts () {
			axios.get('/accounts').then(response => {
				this.accounts = response.data;
			});
		},
		block (who, wich) {
			document.getElementById(`new-${who}`).hidden = false;
			document.getElementById(`new-${wich}`).hidden = true;

			document.getElementById(`new-${who}-mount`).hidden = false;
			document.getElementById(`new-${wich}-mount`).hidden = true;
		}
	},
	created () {
		this.getAccounts();
	}
}
</script>