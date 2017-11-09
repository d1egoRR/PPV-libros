@extends('menuPrincipal')

@section('content')
	{{ session("mensaje") }}

	<br><br>

	<form method="POST" action="">

		<table border="1" width="500" cellspacing="10">
		  <tr>
			<td>Numero Factura: {{ $factura->numero }}</td>
			<td>Fecha: {{ $factura->fecha }}</td>
		  </tr>

		  <tr>
		  	<td>Tipo: {{ $factura->tipo }}</td>
		  	<td>
		  	    Cliente: {{ $factura->cliente_id }}
		  	</td>
		  </tr>

		  <tr>
		  	<td>
		  	  Libro:
		  	  <select name="cboLibro">
		  	  	@foreach ($libros_list as $libro)
		  	  	  <option value="{{ $libro->id }}">
		  	  	  	{{ $libro->titulo }}
		  	  	  </option>
		  	  	@endforeach
		  	  </select>
		  	</td>
		  	<td>
		  	  Cantidad: <input type="number" name="txtCantidad">
		  	</td>
		  </tr>

		  <tr>
		  	<td colspan="2" align="right">
		  		<input type="submit" name="Agregar Libro">
		  	</td>
		  </tr>

		</table>
	</form>

    <table border="1" width="500" cellspacing="10">
      <tr>
      	<th>Codigo</th>
      	<th>Libro</th>
      	<th>Precio Unitario</th>
      	<th>Cantidad</th>
      	<th>Subtotal</th>
      	<th>-</th>
      </tr>

      <tr>
      	<td>500</td>
      	<td>PPV</td>
      	<td>25,50</td>
      	<td>3</td>
      	<td>76,5</td>
      	<td>ELIMINAR</td>
      </tr>
    </table>

@endsection