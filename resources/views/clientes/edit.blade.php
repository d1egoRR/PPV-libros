@extends('menuPrincipal')

@section('content')

  {{ session("mensaje") }}
  <br>

  <form method="POST" action="{{ asset('clientes/' . $cliente->id) }}">
    <input type="hidden" name="_method" value="PUT">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    Nombre: <input type="text" name="txtNombre" value="{{ $cliente->persona->nombre }}"><br>

    Apellido: <input type="text" name="txtApellido" value="{{ $cliente->persona->apellido }}"><br>

    DNI: <input type="text" name="txtDNI" value="{{ $cliente->persona->dni }}"><br>

    Fecha de Nacimiento: <input type="date" name="txtFechaNacimiento" value="{{ $cliente->persona->fecha_nacimiento }}"><br>

    Domicilio: <input type="text" name="txtDomicilio" value="{{$cliente->persona->domicilio}}"><br>

    <input type="submit" value="Modificar datos">
  </form>

  <br><br>

  <a href="/libros/public/clientes">Listado</a>
@endsection