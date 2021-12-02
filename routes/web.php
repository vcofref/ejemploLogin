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
Route::get('/eliminarProducto/{id}', [App\Http\Controllers\ProductosController::class, 'deleteProducto'])->name('eliminarProducto');
Route::post('/updateProducto/{id}', [App\Http\Controllers\ProductosController::class, 'updateProducto'])->name('updateProducto');


Route::get('/sucursal/index' , [App\Http\Controllers\SucursalController::class , 'index'])->name('sucursal.index');
// Route::get('/sucursal/create' , [App\Http\Controllers\SucursalController::class , 'create'])->name('sucursal.create');
Route::post('/sucursal/store' , [App\Http\Controllers\SucursalController::class , 'store'])->name('sucursal.store');
// Route::get('/sucursal/edit/{id}' , [App\Http\Controllers\SucursalController::class , 'edit'])->name('sucursal.edit');
Route::put('/sucursal/update/{id}' , [App\Http\Controllers\SucursalController::class , 'update'])->name('sucursal.update');
Route::delete('/sucursal/delete/{id}' , [App\Http\Controllers\SucursalController::class , 'destroy'])->name('sucursal.delete');