Cliente: {{ $cliente->persona->apellido }}, {{ $cliente->persona->nombre }}
<br><br>
<form method="POST" action="{{ asset('clientes/' . $cliente->id) }}">
	{{ method_field('DELETE') }}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" value="Eliminar">
</form>