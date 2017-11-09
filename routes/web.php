<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource("clientes", "ClienteController");
Route::resource("proveedores", "ProveedorController");
Route::resource("libros", "LibroController");
Route::resource("stock", "StockController");
Route::resource("facturas", "FacturaController");

Route::get('facturas/{id}/detalle/add', 'FacturaController@detalleadd');
