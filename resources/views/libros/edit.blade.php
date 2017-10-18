@extends('menuPrincipal')

@section('content')

  {{ session("mensaje") }}
  <br>

  <form method="POST" action="{{ asset('libros/' . $libro->id) }}">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    Título: <input type="text" name="txtTitulo" value="{{ $libro->titulo }}"><br>

    Editorial: <input type="text" name="txtEditorial" value="{{ $libro->editorial }}"><br>

    Autor: <input type="text" name="txtAutor" value="{{ $libro->autor }}"><br>

    Fecha edición: <input type="date" name="txtFechaEdicion" value="{{ $libro->fecha_edicion }}"><br>

    Tipo tapa:
    <select name='cboTipoTapa'>
      <option value='Dura' @if ($libro->tipo_tapa == "Dura") SELECTED @endif >
        Dura
      </option>
      <option value='Blanda' @if ($libro->tipo_tapa == "Blanda") SELECTED @endif >
        Blanda
      </option>
    </select>
    <br>

    Género:
    <select name='cboGenero'>
      <option value='Drama' @if ($libro->genero == "Drama") SELECTED @endif >
        Drama
      </option>
      <option value='Policial' @if ($libro->genero == "Policial") SELECTED @endif>
        Policial
      </option>
      <option value='Ficcion' @if ($libro->genero == "Ficcion") SELECTED @endif>
        Ciencia Ficcion
      </option>
      <option value='Politica' @if ($libro->genero == "Politica") SELECTED @endif>
        Política
      </option>
    </select>

    <br>

    Precio: <input type="number" name="txtPrecio" value="{{ $libro->precio }}"><br>

    Proveedor:
    <select name='cboProveedor'>
      @foreach ($proveedores_list as $proveedor)
        <option value='{{ $proveedor->id }}' @if ($libro->proveedor_id == $proveedor->id) SELECTED @endif>
          {{ $proveedor->razon_social }}
        </option>
      @endforeach
    </select>

    <br>

    <input type="submit" value="Guardar datos">
  </form>

  <br><br>

  <a href="/libros/public/libros">Listado</a>
@endsection