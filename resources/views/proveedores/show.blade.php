@extends('menuPrincipal')

@section('content')
  Proveedor: {{ $proveedor->razon_social }}
  <br><br>
  <form method="POST" action="{{ asset('proveedores/' . $proveedor->id) }}">
  	{{ method_field('DELETE') }}
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  	<input type="submit" value="Eliminar">
  </form>
@endsection