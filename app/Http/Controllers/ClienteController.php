<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
    	$clientes_list = Cliente::all();
    	return view("clientes.index", ["clientes_list" => $clientes_list]);   	
    }

    public function create()
    {
    	return view("clientes.create");
    }

    public function store(Request $request)
    {
    	// obtener datos enviados desde formulario
    	$nombre = $request->input("txtNombre");
    	$apellido = $request->input("txtApellido");
    	$dni = $request->input("txtDNI");
    	$fechaNacimiento = $request->input("txtFechaNacimiento");
    	$domicilio = $request->input("txtDomicilio");

    	// crear nueva persona
    	$persona = new Persona();
    	$persona->nombre = $nombre;
    	$persona->apellido = $apellido;
    	$persona->dni = $dni;
    	$persona->fecha_nacimiento = $fechaNacimiento;
    	$persona->domicilio = $domicilio;
    	$persona->save();

    	// crear nuevo cliente
    	$cliente = new Cliente();
    	$cliente->persona_id = $persona->id;
    	$cliente->save();


    }
}