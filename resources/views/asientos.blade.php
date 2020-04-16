@extends('layout.layout')

@section('title','Home')

@section('content')
	<div id="table-asientos">
		<form class="search">
			<h1>BUSCAR ASIENTO</h1>
			<div class="id">
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
			<button type="submit">BUSCAR</button>
		</form>
		<table>
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Descripcion</th>
					<th>Debe</th>
					<th>Haber</th>
				</tr>
				{{-- @foreach ($asientos as $asiento)
					<asiento></asiento>
				@endforeach --}}
			</thead>
			<tbody>
	
			</tbody>
		</table>
	</div>

	<script src=" {{ asset('js/app.js') }} "></script>
@endsection