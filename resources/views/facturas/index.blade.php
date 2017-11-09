@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}
	<br><br>

	<a href="facturas/create">Nueva Factura</a>

	<br><br>

	<table border="1">
		<tr>
			<th>Nro Factura</th>
			<th>Fecha</th>
			<th>Tipo</th>
			<th>Cliente</th>
			<th>Total</th>
			<th>-</th>
	    </tr>

	    @foreach ($facturas_list as $factura)

	   	<tr>
			<td>{{ $factura->numero }}</td>
			<td>{{ $factura->fecha }}</td>
			<td>{{ $factura->tipo }}</td>
			<td>{{ $factura->cliente_id }}</td>
			<td>$</td>
			<td>
				<a href="facturas/{{ $factura->id }}/detalle/add">Detalle</a>
			</td>
	    </tr>

	    @endforeach
	</table>
@endsection