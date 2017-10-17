@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}
	<br><br>

	<a href="clientes/create">Nuevo Cliente</a>

	<br><br>

	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>DNI</th>
			<th>ACTIVO</th>
			<th>-</th>
	    </tr>

	    @foreach ($clientes_list as $cliente)

	   	<tr>
			<td>{{ $cliente->persona->nombre }}</td>
			<td>{{ $cliente->persona->apellido }}</td>
			<td>{{ $cliente->persona->dni }}</td>
			<td>{{ $cliente->activo }}</td>
			<td>
				<a href="clientes/{{ $cliente->id }}/edit">Modificar</a> - 
			    <a href="clientes/{{ $cliente->id }}">Eliminar</a>
			</td>
	    </tr>

	    @endforeach
	</table>
@endsection