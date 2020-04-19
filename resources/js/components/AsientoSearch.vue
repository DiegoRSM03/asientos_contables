<template>
	<form id="asientos-search">
		<h1>Buscar Asiento</h1>
		<div class="search-id">
			<span class="flaticon-information"></span>
			<input type="number" name="search-id" id="search-id" min="1" max="100" placeholder="Id del Asiento" required>
		</div>
		<fieldset>
			<legend>Ordenar Por</legend>
			<div class="order-by-id">
				<label>Numero de asiento</label>
				<input type="radio" name="search-radio" id="order-id">
				<span class="flaticon-list"></span>
			</div>
			<div class="order-by-date">
				<label>Fecha de asiento</label>
				<input type="radio" name="search-radio" id="order-date">
				<span class="flaticon-calendar"></span>
			</div>
		</fieldset>
		<input type="submit" value="Buscar">
	</form>
</template>

<script>
export default {
	name: 'asientos-search'
}
</script>