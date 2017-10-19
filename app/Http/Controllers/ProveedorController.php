<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores_list = Proveedor::all();
        return view("proveedores.index", ["proveedores_list" => $proveedores_list]);     
    }

    public function create()
    {
        return view("proveedores.create");
    }

    public function store(Request $request)
    {
        // obtener datos enviados desde formulario
        $razonSocial = $request->input("txtRazonSocial");
        $celular = $request->input("txtCelular");
        $telefonoFijo = $request->input("txtTelefonoFijo");
        $email = $request->input("txtEmail");
        $domicilio = $request->input("txtDomicilio");

        if ($razonSocial == "") {
            $mensaje = "ERROR";
            return redirect("proveedores/create")->with("mensaje", $mensaje);
        }

        // crear nuevo proveedor
        $proveedor = new Proveedor();
        $proveedor->razon_social = $razonSocial;
        $proveedor->celular = $celular;
        $proveedor->telefono_fijo = $telefonoFijo;
        $proveedor->email = $email;
        $proveedor->domicilio = $domicilio;
        $proveedor->save();

        $mensaje = "PROVEEDOR CREADO CORRECTAMENTE";
        return redirect("proveedores/create")->with("mensaje", $mensaje);
    }


    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view("proveedores.show", ["proveedor"=>$proveedor]);
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();

        $mensaje = "PROVEEDOR BORRADO!";
        return redirect("proveedores")->with("mensaje", $mensaje);
    }

    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view("proveedores.edit", ["proveedor"=>$proveedor]);
    }

    public function update(Request $request, $id)
    {
        // obtener datos enviados desde formulario
        $razonSocial = $request->input("txtRazonSocial");
        $celular = $request->input("txtCelular");
        $telefonoFijo = $request->input("txtTelefonoFijo");
        $email = $request->input("txtEmail");
        $domicilio = $request->input("txtDomicilio");

        // obtener el proveedor a modificar
        $proveedor = Proveedor::find($id);

        // asignar datos al proveedor
        $proveedor->razon_social = $razonSocial;
        $proveedor->celular = $celular;
        $proveedor->telefono_fijo = $telefonoFijo;
        $proveedor->email = $email;
        $proveedor->domicilio = $domicilio;
        $proveedor->save();

        $mensaje = "PROVEEDOR MODIFICADO CORRECTAMENTE";
        return redirect("proveedores/" . $id . "/edit")->with("mensaje", $mensaje);
    }
}