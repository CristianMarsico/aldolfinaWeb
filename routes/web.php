<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\EdadController;
use App\Http\Controllers\ImagenController;

// Route::get('/', [ProductoController::class, 'paginaInicio'])
//     ->name('inicio');

Route::get('/', [ProductoController::class, 'paginaInicio'])
    ->name('home');

// Route::get('/pañales/{id}', [ProductoController::class, 'verPanales'])
//     ->name('panales');

Route::get('productos/{categoria}/{id_categoria}', [ProductoController::class, 'productos'])->name('productos');


Route::post('/filtrarPanales/{id}', [ProductoController::class, 'filtrarPanales'])
    ->name('filtrar.panales');

// Route::get('/higiene/{id}', [ProductoController::class, 'verHigiene'])
//     ->name('higiene');

Route::post('/filtrarHigiene/{id}', [ProductoController::class, 'filtrarHigiene'])
    ->name('filtrar.higiene');

Route::get('/contacto', [ProductoController::class, 'paginaContacto'])    
    ->name('contacto');

Route::get('/producto/{id}', [ProductoController::class, 'paginaDetalleProducto'])    
    ->name('detalleProducto');

Route::get('/login', [AuthController::class, 'paginaLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'verifyLogin'])
    ->name('login.verify');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('isLogged')->group(function () {

    Route::get('/administracion', [AuthController::class, 'paginaAdministracion'])
        ->middleware('isLogged')
        ->name('administracion');

    // CORRESPONDIENTE A AMB PAÑALES
    // Route::get('/abm/panales/{id_categoria}', [AuthController::class, 'abmPanales'])
    //     ->middleware('isLogged')
    //     ->name('administracionPañales');

    Route::get('/abm/pañales/editar/{id}',[AuthController::class, 'editarPanal'])
        ->middleware('isLogged')
        ->name('editarPanal');

    Route::post('/abm/pañales/guardar', [AuthController::class, 'guardarPanal'])
        ->middleware('isLogged')
        ->name('guardarPanal');
    
    Route::get('/abm/pañales/eliminar/{id}',[AuthController::class, 'eliminarPanal'])
        ->middleware('isLogged')
        ->name('eliminarPanal');

    Route::get('/buscar-productos/{id_categoria}', [AuthController::class, 'buscarProductos']);
});






// Dashboard redirect or welcome
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Productos por categoría
Route::get('/admin/productos/{categoria}/{id_categoria}', [AdminController::class, 'productos'])->name('admin.productos');

// Marcas
Route::get('/admin/marcas', [MarcaController::class, 'index'])->name('admin.marcas');
Route::post('/admin/marcas/guardar', [MarcaController::class, 'store'])->name('admin.marcas.guardar');
Route::get('/admin/marcas/eliminar/{id}', [MarcaController::class, 'destroy'])->name('admin.marcas.eliminar');
// Edades
Route::get('/admin/edades', [EdadController::class, 'index'])->name('admin.edades');
Route::post('/admin/edades/guardar', [EdadController::class, 'store'])->name('admin.edades.guardar');
Route::get('/admin/edades/eliminar/{id}', [EdadController::class, 'destroy'])->name('admin.edades.eliminar');
// Imágenes
Route::get('/admin/imagenes', [ImagenController::class, 'index'])->name('admin.imagenes');
Route::post('/admin/imagenes/guardar', [ImagenController::class, 'store'])->name('admin.imagenes.guardar');
Route::get('/admin/imagenes/eliminar/{id}', [ImagenController::class, 'destroy'])->name('admin.imagenes.eliminar');