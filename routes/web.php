<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Productos GET
Route::get('/listar', [App\Http\Controllers\ProductosController::class, 'listar'])->name('listarProductos');
Route::get('/agregar', [App\Http\Controllers\ProductosController::class, 'agregar'])->name('agregarProductos');
Route::get('/editar/{id}', [App\Http\Controllers\ProductosController::class, 'index'])->name('editarProductos');
Route::get('/miniatura/{filename}', [App\Http\Controllers\ProductosController::class, 'getImagen'])->name('miniatura');
Route::get('/eliminarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'deleteProducto'])->name('eliminarProducto');
// Productos POST
Route::post('/guardarProducto', [App\Http\Controllers\ProductosController::class, 'guardar']);
Route::post('/actualizarProducto', [App\Http\Controllers\ProductosController::class, 'editProducto'])->name('actualizarProducto');;
// Sucursal GET
Route::get('/listarSucursales', [App\Http\Controllers\SucursalesController::class, 'listar'])->name('listarSucursales');
Route::get('/agregarSucursales', [App\Http\Controllers\SucursalesController::class, 'agregar'])->name('agregarSucursales');
Route::get('/eliminarSucursal/{id}', [App\Http\Controllers\SucursalesController::class, 'deleteSucursal'])->name('eliminarSucursal');
Route::get('/editarSucursal/{id}', [App\Http\Controllers\SucursalesController::class, 'editSucursal'])->name('editarSucursal');
//Sucursal POST
Route::post('/guardarSucursal', [App\Http\Controllers\SucursalesController::class, 'guardar']);
Route::post('/actualizarSucursal', [App\Http\Controllers\SucursalesController::class, 'actualizar']);
