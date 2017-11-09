@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}
	<br>

	<form method="POST" action="{{ asset('facturas') }}">

	  <input type="hidden" name="_token" value="{{ csrf_token() }}">

	  Numero <input type="number" name="txtNumero"><br>

	  Fecha: <input type="date" name="txtFecha"><br>

	  Tipo:
	  <select name="cboTipo">
	  	<option value="A">A</option>
	  	<option value="B">B</option>
	  	<option value="C">C</option>
	  </select>
	  <br>

	  Cliente:
	  <select name="cboCliente">
	  	@foreach ($clientes_list as $cliente)
	  	  <option value="{{ $cliente->id }}">
	  	  	{{ $cliente->persona->apellido }}, {{ $cliente->persona->nombre }}
	  	  </option>
	  	@endforeach
	  </select>

	  <br>

	  <input type="submit" value="Guardar datos">
	</form>

	<br><br>

	<a href="/libros/public/facturas">Listado</a>
@endsection