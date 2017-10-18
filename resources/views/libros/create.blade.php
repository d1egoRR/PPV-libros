@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}
	<br>

	<form method="POST" action="{{ asset('libros') }}">

	  <input type="hidden" name="_token" value="{{ csrf_token() }}">

	  Título: <input type="text" name="txtTitulo"><br>

	  Editorial: <input type="text" name="txtEditorial"><br>

	  Autor: <input type="text" name="txtAutor"><br>

	  Fecha edición: <input type="date" name="txtFechaEdicion"><br>

	  Tipo tapa:
	  <select name='cboTipoTapa'>
	  	<option value='Dura'>Dura</option>
	  	<option value='Blanda'>Blanda</option>
	  </select>
	  <br>

	  Género:
	  <select name='cboGenero'>
	  	<option value='Drama'>Drama</option>
	  	<option value='Policial'>Policial</option>
	  	<option value='Ficcion'>Ciencia Ficcion</option>
	  	<option value='Politica'>Política</option>
	  </select>

	  <br>

	  Precio: <input type="number" name="txtPrecio"><br>

	  Proveedor:
	  <select name='cboProveedor'>
	    @foreach ($proveedores_list as $proveedor)
	  	  <option value='{{ $proveedor->id }}'>{{ $proveedor->razon_social }}</option>
	  	@endforeach
	  </select>

	  <br>

	  <input type="submit" value="Guardar datos">
	</form>

	<br><br>

	<a href="/libros/public/libros">Listado</a>
@endsection