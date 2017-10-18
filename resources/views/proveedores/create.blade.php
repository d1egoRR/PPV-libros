@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}
	<br>

	<form method="POST" action="{{ asset('proveedores') }}">

	  <input type="hidden" name="_token" value="{{ csrf_token() }}">

	  Razón Social: <input type="text" name="txtRazonSocial"><br>

	  Celular: <input type="text" name="txtCelular"><br>

	  Teléfono fijo: <input type="text" name="txtTelefonoFijo"><br>

	  Email: <input type="text" name="txtEmail"><br>

	  Domicilio: <input type="text" name="txtDomicilio"><br>

	  <input type="submit" value="Guardar datos">
	</form>

	<br><br>

	<a href="/libros/public/proveedores">Listado</a>
@endsection