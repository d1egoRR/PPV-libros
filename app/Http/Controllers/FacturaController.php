<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Libro;
use App\Models\DetalleFactura;


class FacturaController extends Controller
{
    public function index()
    {
        $facturas_list = Factura::all();

        foreach ($facturas_list as $factura) {
            $factura->total = $factura->obtenerTotal();
        }


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
        //return redirect("facturas/create")->with("mensaje", $mensaje);
        return redirect("facturas/" . $factura->id . "/detalle/add")->with("mensaje", $mensaje);
    }

    public function detalleadd($id)
    {
        $factura = Factura::find($id);
        $factura->total = $factura->obtenerTotal();

        $libros_list = Libro::all();
        $detalle_list = DetalleFactura::where('factura_id', $id)->get();

        foreach ($detalle_list as $detalle) {
            $detalle->subtotal = $detalle->obtenerSubTotal();
        }

        return view(
            'facturas.detalleAdd',
            ['factura'=>$factura, 'libros_list'=>$libros_list, 'detalle_list'=>$detalle_list]
        );
    }

    public function detalleaddstore(Request $request, $factura_id)
    {
        $libro_id = $request->input("cboLibro");
        $cantidad = $request->input("txtCantidad");

        $libro = Libro::find($libro_id);

        $detalle = new DetalleFactura();
        $detalle->factura_id = $factura_id;
        $detalle->libro_id = $libro_id;
        $detalle->cantidad = $cantidad;
        $detalle->precio = $libro->precio;
        $detalle->save();

        $mensaje = "LIBRO AGREGADO CORRECTAMENTE.";
        return redirect("facturas/" . $factura_id . "/detalle/add")->with("mensaje", $mensaje);
    }

    public function detalledelete($detalle_id)
    {
        $detalle = DetalleFactura::find($detalle_id);
        $factura_id = $detalle->factura_id;
        $detalle->delete();

        $mensaje = "ITEM BORRADO.";
        return redirect("facturas/" . $factura_id . "/detalle/add")->with("mensaje", $mensaje);
    }
}
