<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Proveedor;

class LibroController extends Controller
{
    public function index()
    {
        $libros_list = Libro::all();
        return view("libros.index", ["libros_list" => $libros_list]);     
    }

    public function create()
    {
        $proveedores_list = Proveedor::all();
        return view("libros.create", ["proveedores_list" => $proveedores_list]);
    }

    public function store(Request $request)
    {
        // obtener datos enviados desde formulario
        $titulo = $request->input("txtTitulo");
        $editorial = $request->input("txtEditorial");
        $autor = $request->input("txtAutor");
        $fechaEdicion = $request->input("txtFechaEdicion");
        $tipoTapa = $request->input("cboTipoTapa");
        $genero = $request->input("cboGenero");
        $precio = $request->input("txtPrecio");
        $proveedor = $request->input("cboProveedor");

        // crear nuevo libro
        $libro = new Libro();
        $libro->titulo = $titulo;
        $libro->editorial = $editorial;
        $libro->autor = $autor;
        $libro->fecha_edicion = $fechaEdicion;
        $libro->tipo_tapa = $tipoTapa;
        $libro->genero = $genero;
        $libro->precio = $precio;
        $libro->proveedor_id = $proveedor;
        $libro->save();

        $mensaje = "LIBRO CREADO CORRECTAMENTE";
        return redirect("libros/create")->with("mensaje", $mensaje);
    }


    public function show($id)
    {
        $libro = Libro::find($id);
        return view("libros.show", ["libro"=>$libro]);
    }

    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro->delete();

        $mensaje = "LIBRO BORRADO!";
        return redirect("libros")->with("mensaje", $mensaje);
    }

    public function edit($id)
    {
        $libro = Libro::find($id);
        $proveedores_list = Proveedor::all();
        return view("libros.edit", ["libro"=>$libro, "proveedores_list"=>$proveedores_list]);
    }

    public function update(Request $request, $id)
    {
        // obtener datos enviados desde formulario
        $titulo = $request->input("txtTitulo");
        $editorial = $request->input("txtEditorial");
        $autor = $request->input("txtAutor");
        $fechaEdicion = $request->input("txtFechaEdicion");
        $tipoTapa = $request->input("cboTipoTapa");
        $genero = $request->input("cboGenero");
        $precio = $request->input("txtPrecio");
        $proveedor = $request->input("cboProveedor");

        // obtener el proveedor a modificar
        $libro = Libro::find($id);

        // asignar datos al libro
        $libro->titulo = $titulo;
        $libro->editorial = $editorial;
        $libro->autor = $autor;
        $libro->fecha_edicion = $fechaEdicion;
        $libro->tipo_tapa = $tipoTapa;
        $libro->genero = $genero;
        $libro->precio = $precio;
        $libro->proveedor_id = $proveedor;
        $libro->save();

        $mensaje = "LIBRO MODIFICADO CORRECTAMENTE";
        return redirect("libros/" . $id . "/edit")->with("mensaje", $mensaje);
    }
}