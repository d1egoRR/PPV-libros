@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}
	<br><br>

	<a href="proveedores/create">Nuevo Proveedor</a>

	<br><br>

	<table border="1">
		<tr>
			<th>Razón Social</th>
			<th>Email</th>
			<th>Celular</th>
			<th>Fijo</th>
			<th>-</th>
	    </tr>

	    @foreach ($proveedores_list as $proveedor)

	   	<tr>
			<td>{{ $proveedor->razon_social }}</td>
			<td>{{ $proveedor->email }}</td>
			<td>{{ $proveedor->celular }}</td>
			<td>{{ $proveedor->telefono_fijo }}</td>
			<td>
				<a href="proveedores/{{ $proveedor->id }}/edit">Modificar</a> - 
			    <a href="proveedores/{{ $proveedor->id }}">Eliminar</a>
			</td>
	    </tr>

	    @endforeach
	</table>
@endsection