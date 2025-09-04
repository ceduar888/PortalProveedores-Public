<?php

use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('/proveedor')->group(function () {
    
    Route::get('/solicitud-paso-1', [ProveedorController::class, 'edit1'])->name('solicitud.1');
    Route::post('/solicitud-paso-1', [ProveedorController::class, 'store1']);
    Route::get('/obtener-pais', [ProveedorController::class, 'obtenerPais']);
    Route::get('/solicitud-paso-2', [ProveedorController::class, 'edit2']);
    Route::post('/solicitud-paso-2', [ProveedorController::class, 'store2']);
    Route::get('/solicitud-paso-3', [ProveedorController::class, 'edit3']);
    Route::post('/solicitud-paso-3', [ProveedorController::class, 'store3']);
    Route::get('/solicitud-paso-4', [ProveedorController::class, 'edit4']);
    Route::post('/solicitud-paso-4', [ProveedorController::class, 'store4']);

});