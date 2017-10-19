@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}
	<br><br>

	<table border="1">
		<tr>
			<th>LIBRO</th>
			<th>Cantidad Minima</th>
			<th>Cantidad Actual</th>
			<th>-</th>
	    </tr>

	    @foreach ($stock_list as $stock)

	   	<tr>
			<td>{{ $stock->libro->titulo }}</td>
			<td>{{ $stock->cantidad_minima }}</td>
			<td>{{ $stock->cantidad_actual }}</td>
			<td>
				<a href="stock/{{ $stock->id }}/edit">Actualizar</a>
			</td>
	    </tr>

	    @endforeach
	</table>
@endsection