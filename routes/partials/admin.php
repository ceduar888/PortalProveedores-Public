<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NoticiasController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function () {
    
    Route::get('/', [AdminController::class, 'index'])->name('panel-admin');
    Route::post('/noticia-1', [NoticiasController::class, 'noticia1']);
    Route::post('/noticia-2', [NoticiasController::class, 'noticia2']);
    Route::post('/noticia-3', [NoticiasController::class, 'noticia3']);
    Route::post('/noticia-4', [NoticiasController::class, 'noticia4']);

});