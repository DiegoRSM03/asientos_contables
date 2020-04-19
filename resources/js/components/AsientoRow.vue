<template>
	<tr id="asiento-row">
		<td class="code"><p> {{ id }} </p></td>
		<td class="account-debe">
			<select v-model="id" name="new-debe" id="new-debe">
				<option disabled selected>Cuenta</option>
				<option v-for="account in accounts" :key="account.id" :value="account.id">{{ account.name }}</option>
			</select>
		</td>
		<td class="account-haber">
			<select v-model="id" name="new-haber" id="new-haber">
				<option disabled selected>Cuenta</option>
				<option v-for="account in accounts" :key="account.id" :value="account.id">{{ account.name }}</option>
			</select>
		</td>
		<td class="number-debe">
			<input type="number" name="new-debe-mount" id="new-debe-mount" min="1" max="99" required>
		</td>
		<td class="number-haber">
			<input type="number" name="new-haber-mount" id="new-haber-mount" min="1" max="99" required>
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
			accounts: []
		}
	},
	methods: {
		getAccounts () {
			axios.get('/accounts').then(response => {
				this.accounts = response.data;
			});
		}
	},
	created () {
		this.getAccounts();
	}
}
</script>