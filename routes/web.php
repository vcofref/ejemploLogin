<?php

use Illuminate\Support\Facades\Auth;
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
<<<<<<< HEAD
<<<<<<< HEAD

Route::get('/eliminarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'deleteProducto'])->name('eliminarProducto');

Route::get('/buscarProducto/{search?}', [App\Http\Controllers\ProductosController::class, 'searchProducto'])->name('buscarProducto');
=======
Route::get('/eliminarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'deleteProducto'])->name('eliminarProducto');
Route::post('/updateProducto/{id}', [App\Http\Controllers\ProductosController::class, 'updateProducto'])->name('updateProducto');


Route::get('/sucursal/index' , [App\Http\Controllers\SucursalController::class , 'index'])->name('sucursal.index');
// Route::get('/sucursal/create' , [App\Http\Controllers\SucursalController::class , 'create'])->name('sucursal.create');
Route::post('/sucursal/store' , [App\Http\Controllers\SucursalController::class , 'store'])->name('sucursal.store');
// Route::get('/sucursal/edit/{id}' , [App\Http\Controllers\SucursalController::class , 'edit'])->name('sucursal.edit');
Route::put('/sucursal/update/{id}' , [App\Http\Controllers\SucursalController::class , 'update'])->name('sucursal.update');
Route::delete('/sucursal/delete/{id}' , [App\Http\Controllers\SucursalController::class , 'destroy'])->name('sucursal.delete');
>>>>>>> fa1deb33401c32b596a872c9c8a0ce3cb1db86b2
=======
Route::get('/eliminarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'deleteProducto'])->name('eliminarProducto');

Route::get('/listarS', [App\Http\Controllers\SucursalesController::class, 'listarS'])->name('listarSucursales');
Route::get('/agregarS', [App\Http\Controllers\SucursalesController::class, 'agregarS'])->name('agregarSucursales');

Route::post('/guardarSucursal', [App\Http\Controllers\SucursalesController::class, 'guardarS']);

Route::delete('/eliminarSucursal/{id}', [App\Http\Controllers\SucursalesController::class, 'eliminarSucursal'])->name('eliminarSucursal');

Route::put('/actualizar/{id}' , [App\Http\Controllers\SucursalesController::class , 'actualizarSucursal'])->name('actualizar');
Route::get('/updateProducto/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('updateProducto');
>>>>>>> 5067598fa797721183f3bef6c72167690918ff10
