

<table border="1">
	<tr>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>DNI</th>
		<th>ACTIVO</th>
    </tr>

    @foreach ($clientes_list as $cliente)

   	<tr>
		<td>{{ $cliente->persona->nombre }}</td>
		<td>{{ $cliente->persona->apellido }}</td>
		<td>{{ $cliente->persona->dni }}</td>
		<td>{{ $cliente->activo }}</td>
    </tr>

    @endforeach
</table>