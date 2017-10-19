<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;


class StockController extends Controller
{
    public function index()
    {
    	$stock_list = Stock::all();
    	return view('stock.index', ["stock_list" => $stock_list]);
    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        return view("stock.edit", ["stock"=>$stock]);
    }

    public function update(Request $request, $id)
    {
        // obtener datos enviados desde formulario
        $cantidadMinima = $request->input("txtCantidadMinima");
        $cantidadActual = $request->input("txtCantidadActual");

        // validacion
        if ($cantidadActual < $cantidadMinima) {
            $mensaje = "CANTIDAD ACTUAL DEBE SER MAYOR O IGUAL A MINIMA";
            return redirect("stock/" . $id . "/edit")->with("mensaje", $mensaje);
        }

        // obtener el stock
        $stock = Stock::find($id);
        $stock->cantidad_minima = $cantidadMinima;
        $stock->cantidad_actual = $cantidadActual;
        $stock->save();

        $mensaje = "STOCK ACTUALIZADO!";
        return redirect("stock/" . $id . "/edit")->with("mensaje", $mensaje);
    }
}
