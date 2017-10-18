@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}
	<br><br>

	<a href="libros/create">Nuevo Libro</a>

	<br><br>

	<table border="1">
		<tr>
			<th>Título</th>
			<th>Editorial</th>
			<th>Autor</th>
			<th>Género</th>
			<th>Precio</th>
			<th>-</th>
	    </tr>

	    @foreach ($libros_list as $libro)

	   	<tr>
			<td>{{ $libro->titulo }}</td>
			<td>{{ $libro->editorial }}</td>
			<td>{{ $libro->autor }}</td>
			<td>{{ $libro->genero }}</td>
			<td>{{ $libro->precio }}</td>
			<td>
				<a href="libros/{{ $libro->id }}/edit">Modificar</a> - 
			    <a href="libros/{{ $libro->id }}">Eliminar</a>
			</td>
	    </tr>

	    @endforeach
	</table>
@endsection