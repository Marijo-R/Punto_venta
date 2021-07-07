<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TipoMedidaController;

Route::view('index','index')->middleware('auth');

//Rutas para el login
Route::get('/', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

//CRUD - Usuario
Route::get('/lista_usuarios', [UsuarioController::class, 'index'])->name('indexUs')->middleware('auth');
Route::get('/registrar_usuario', [UsuarioController::class, 'create'])->name('createUs')->middleware('auth');
Route::post('/registrar_usuario', [UsuarioController::class, 'store'])->name('storeUs')->middleware('auth');
Route::get('/actualizar_usuario/{id_usuario}', [UsuarioController::class, 'edit'])->name('editUs')->middleware('auth');
Route::put('/actualizar_usuario/update/{id_usuario}', [UsuarioController::class, 'update'])->name('updateUs')->middleware('auth');
Route::delete('/eliminar_usuario/{id_usuario}', [UsuarioController::class, 'destroy'])->name('destroyUs')->middleware('auth');
Route::get('/papelera_usuario', [UsuarioController::class, 'recycle'])->name('recycleUs')->middleware('auth');
Route::get('/recuperar_usuario/{id_usuario}', [UsuarioController::class, 'recover'])->name('recoverUs')->middleware('auth');

//CRUD - TipoPuesto
Route::get('/lista_medidas', [TipoMedidaController::class, 'index'])->name('indexMed')->middleware('auth');
Route::get('/registrar_medida', [TipoMedidaController::class, 'create'])->name('createMed')->middleware('auth');
Route::post('/registrar_medida', [TipoMedidaController::class, 'store'])->name('storeMed')->middleware('auth');
Route::get('/actualizar_medida/{id_medida}', [TipoMedidaController::class, 'edit'])->name('editMed')->middleware('auth');
Route::put('/actualizar_medida/update/{id_medida}', [TipoMedidaController::class, 'update'])->name('updateMed')->middleware('auth');
Route::delete('/eliminar_medida/{id_medida}', [TipoMedidaController::class, 'destroy'])->name('destroyMed')->middleware('auth');
Route::get('/papelera_medida', [TipoMedidaController::class, 'recycle'])->name('recycleMed')->middleware('auth');
Route::get('/recuperar_medida/{id_medida}', [TipoMedidaController::class, 'recover'])->name('recoverMed')->middleware('auth');
