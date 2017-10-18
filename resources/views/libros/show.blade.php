@extends('menuPrincipal')

@section('content')

  Libro: {{ $libro->titulo }}
  <br><br>
  <form method="POST" action="{{ asset('libros/' . $libro->id) }}">
  	{{ method_field('DELETE') }}
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  	<input type="submit" value="Eliminar">
  </form>
@endsection