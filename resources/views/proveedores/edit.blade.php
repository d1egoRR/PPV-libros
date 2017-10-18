@extends('menuPrincipal')

@section('content')

  {{ session("mensaje") }}
  <br>

  <form method="POST" action="{{ asset('proveedores/' . $proveedor->id) }}">
    <input type="hidden" name="_method" value="PUT">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    Razón Social: <input type="text" name="txtRazonSocial" value="{{ $proveedor->razon_social }}"><br>

    Celular: <input type="text" name="txtCelular" value="{{ $proveedor->celular }}"><br>

    Teléfono Fijo: <input type="text" name="txtTelefonoFijo" value="{{ $proveedor->telefono_fijo }}"><br>

    Email: <input type="text" name="txtEmail" value="{{$proveedor->email}}"><br>

    Domicilio: <input type="text" name="txtDomicilio" value="{{$proveedor->domicilio}}"><br>

    <input type="submit" value="Modificar datos">
  </form>

  <br><br>

  <a href="/libros/public/proveedores">Listado</a>
@endsection