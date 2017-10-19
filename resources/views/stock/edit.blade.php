@extends('menuPrincipal')

@section('content')

  {{ session("mensaje") }}
  <br>

  <form method="POST" action="{{ asset('stock/' . $stock->id) }}">
    <input type="hidden" name="_method" value="PUT">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    Libro: {{ $stock->libro->titulo }}<br>

    Cantidad Minima: <input type="number" name="txtCantidadMinima" value="{{ $stock->cantidad_minima }}"><br>

    Cantidad Actual: <input type="number" name="txtCantidadActual" value="{{ $stock->cantidad_actual }}"><br>

    <input type="submit" value="Actualizar Stock">
  </form>

  <br><br>

  <a href="/libros/public/stock">Listado</a>
@endsection