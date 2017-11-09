<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Libro;


class FacturaController extends Controller
{
    public function index()
    {
        $facturas_list = Factura::all();
        return view('facturas.index', ['facturas_list'=>$facturas_list]);
    }

    public function create()
    {
    	$clientes_list = Cliente::all();
    	return view('facturas.create', ['clientes_list'=>$clientes_list]);
    }

    public function store(Request $request)
    {
        // obtener datos enviados desde formulario
        $numeroFactura = $request->input("txtNumero");
        $fecha = $request->input("txtFecha");
        $tipoFactura = $request->input("cboTipo");
        $cliente = $request->input("cboCliente");

        // crear nueva factura
        $factura = new Factura();
        $factura->numero = $numeroFactura;
        $factura->tipo = $tipoFactura;
        $factura->fecha = $fecha;
        $factura->cliente_id = $cliente;
        $factura->save();

        $mensaje = "FACTURA CREADA CORRECTAMENTE";
        return redirect("facturas/create")->with("mensaje", $mensaje);
    }

    public function detalleadd($id)
    {
        $factura = Factura::find($id);
        $libros_list = Libro::all();
        return view(
            'facturas.detalleAdd',
            ['factura'=>$factura, 'libros_list'=>$libros_list]
        );
    }
}
