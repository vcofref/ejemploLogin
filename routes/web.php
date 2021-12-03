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

Route::get('/listar', [App\Http\Controllers\ProductosController::class, 'listar'])->name('listarProductos');
Route::get('/agregar', [App\Http\Controllers\ProductosController::class, 'agregar'])->name('agregarProductos');

Route::post('/guardarProducto', [App\Http\Controllers\ProductosController::class, 'guardar']);

Route::get('/miniatura/{filename}', [App\Http\Controllers\ProductosController::class, 'getImagen'])->name('miniatura');
Route::get('/eliminarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'deleteProducto'])->name('eliminarProducto');

Route::get('/listarS', [App\Http\Controllers\SucursalesController::class, 'listarS'])->name('listarSucursales');
Route::get('/agregarS', [App\Http\Controllers\SucursalesController::class, 'agregarS'])->name('agregarSucursales');

Route::post('/guardarSucursal', [App\Http\Controllers\SucursalesController::class, 'guardarS']);

Route::delete('/eliminarSucursal/{id}', [App\Http\Controllers\SucursalesController::class, 'eliminarSucursal'])->name('eliminarSucursal');

Route::put('/actualizar/{id}' , [App\Http\Controllers\SucursalesController::class , 'actualizarSucursal'])->name('actualizar');

