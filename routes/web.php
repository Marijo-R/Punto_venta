<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TipoMedidaController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteFisController;
use App\Http\Controllers\ClienteMorController;


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

//CRUD - TipoMedida
Route::get('/lista_medidas', [TipoMedidaController::class, 'index'])->name('indexMed')->middleware('auth');
Route::get('/registrar_medida', [TipoMedidaController::class, 'create'])->name('createMed')->middleware('auth');
Route::post('/registrar_medida', [TipoMedidaController::class, 'store'])->name('storeMed')->middleware('auth');
Route::get('/actualizar_medida/{id_medida}', [TipoMedidaController::class, 'edit'])->name('editMed')->middleware('auth');
Route::put('/actualizar_medida/update/{id_medida}', [TipoMedidaController::class, 'update'])->name('updateMed')->middleware('auth');
Route::delete('/eliminar_medida/{id_medida}', [TipoMedidaController::class, 'destroy'])->name('destroyMed')->middleware('auth');
Route::get('/papelera_medida', [TipoMedidaController::class, 'recycle'])->name('recycleMed')->middleware('auth');
Route::get('/recuperar_medida/{id_medida}', [TipoMedidaController::class, 'recover'])->name('recoverMed')->middleware('auth');

//CRUD - Producto
Route::get('/lista_productos', [ProductoController::class, 'index'])->name('indexProd')->middleware('auth');
Route::get('/registrar_producto', [ProductoController::class, 'create'])->name('createProd')->middleware('auth');
Route::post('/registrar_producto', [ProductoController::class, 'store'])->name('storeProd')->middleware('auth');
Route::get('/actualizar_producto/{id_producto}', [ProductoController::class, 'edit'])->name('editProd')->middleware('auth');
Route::put('/actualizar_producto/update/{id_producto}', [ProductoController::class, 'update'])->name('updateProd')->middleware('auth');
Route::delete('/eliminar_producto/{id_producto}', [ProductoController::class, 'destroy'])->name('destroyProd')->middleware('auth');
Route::get('/papelera_producto', [ProductoController::class, 'recycle'])->name('recycleProd')->middleware('auth');
Route::get('/recuperar_producto/{id_producto}', [ProductoController::class, 'recover'])->name('recoverProd')->middleware('auth');

//CRUD - Puesto_empleado
Route::get('/lista_pues', [PuestoController::class, 'index'])->name('indexPues')->middleware('auth');
Route::get('/registrar_pues', [PuestoController::class, 'create'])->name('createPues')->middleware('auth');
Route::post('/registrar_pues', [PuestoController::class, 'store'])->name('storePues')->middleware('auth');
Route::get('/actualizar_pues/{id_puesto}', [PuestoController::class, 'edit'])->name('editPues')->middleware('auth');
Route::put('/actualizar_pues/update/{id_puesto}', [PuestoController::class, 'update'])->name('updatePues')->middleware('auth');
Route::delete('/eliminar_pues/{id_puesto}', [PuestoController::class, 'destroy'])->name('destroyPues')->middleware('auth');
Route::get('/papelera_pues', [PuestoController::class, 'recycle'])->name('recyclePues')->middleware('auth');
Route::get('/recuperar_pues/{id_puesto}', [PuestoController::class, 'recover'])->name('recoverPues')->middleware('auth');

//CRUD - Proveedor
Route::get('/lista_proveedores', [ProveedorController::class, 'index'])->name('indexProv')->middleware('auth');
Route::get('/registrar_proveedor', [ProveedorController::class, 'create'])->name('createProv')->middleware('auth');
Route::post('/registrar_proveedorFis', [ProveedorController::class, 'storeFis'])->name('storeProvFis')->middleware('auth');
Route::post('/registrar_proveedorMor', [ProveedorController::class, 'storeMor'])->name('storeProvMor')->middleware('auth');
Route::get('/actualizar_proveedor/{id_proveedor}', [ProveedorController::class, 'edit'])->name('editProv')->middleware('auth');
Route::put('/actualizar_proveedor/update/{id_proveedor}', [ProveedorController::class, 'update'])->name('updateProv')->middleware('auth');
Route::delete('/eliminar_proveedor/{id_proveedor}', [ProveedorController::class, 'destroy'])->name('destroyProv')->middleware('auth');
Route::get('/papelera_proveedor', [ProveedorController::class, 'recycle'])->name('recycleProv')->middleware('auth');
Route::get('/recuperar_proveedor/{id_proveedor}', [ProveedorController::class, 'recover'])->name('recoverProv')->middleware('auth');

//CRUD - Empleado
Route::get('/lista_empleados', [EmpleadoController::class, 'index'])->name('indexEmpl')->middleware('auth');
Route::get('/registrar_empleado', [EmpleadoController::class, 'create'])->name('createEmpl')->middleware('auth');
Route::post('/registrar_empleado', [EmpleadoController::class, 'store'])->name('storeEmpl')->middleware('auth');
Route::get('/actualizar_empleado/{id_empleado}', [EmpleadoController::class, 'edit'])->name('editEmpl')->middleware('auth');
Route::put('/actualizar_empleado/update/{id_empleado}', [EmpleadoController::class, 'update'])->name('updateEmpl')->middleware('auth');
Route::delete('/eliminar_empleado/{id_empleado}', [EmpleadoController::class, 'destroy'])->name('destroyEmpl')->middleware('auth');
Route::get('/papelera_empleado', [EmpleadoController::class, 'recycle'])->name('recycleEmpl')->middleware('auth');
Route::get('/recuperar_empleado/{id_empleado}', [EmpleadoController::class, 'recover'])->name('recoverEmpl')->middleware('auth');

//CRUD - Cliente Físico
Route::get('/lista_clientes_fis', [ClienteFisController::class, 'index'])->name('indexCliFis')->middleware('auth');
Route::get('/registrar_cliente_fis', [ClienteFisController::class, 'create'])->name('createCliFis')->middleware('auth');
Route::post('/registrar_cliente_fis', [ClienteFisController::class, 'store'])->name('storeCliFis')->middleware('auth');
Route::get('/actualizar_cliente_fis/{id_cliente}', [ClienteFisController::class, 'edit'])->name('editCliFis')->middleware('auth');
Route::put('/actualizar_cliente_fis/update/{id_cliente}', [ClienteFisController::class, 'update'])->name('updateCliFis')->middleware('auth');
Route::delete('/eliminar_cliente_fis/{id_cliente}', [ClienteFisController::class, 'destroy'])->name('destroyCliFis')->middleware('auth');
Route::get('/papelera_cliente_fis', [ClienteFisController::class, 'recycle'])->name('recycleCliFis')->middleware('auth');
Route::get('/recuperar_cliente_fis/{id_cliente}', [ClienteFisController::class, 'recover'])->name('recoverCliFis')->middleware('auth');

//CRUD - Cliente Moral
Route::get('/lista_clientes_mor', [ClienteMorController::class, 'index'])->name('indexCliMor')->middleware('auth');
Route::get('/registrar_cliente_mor', [ClienteMorController::class, 'create'])->name('createCliMor')->middleware('auth');
Route::post('/registrar_cliente_mor', [ClienteMorController::class, 'store'])->name('storeCliMor')->middleware('auth');
Route::get('/actualizar_cliente/{id_cliente}', [ClienteMorController::class, 'edit'])->name('editCliMor')->middleware('auth');
Route::put('/actualizar_cliente/update/{id_cliente}', [ClienteMorController::class, 'update'])->name('updateCliMor')->middleware('auth');
Route::delete('/eliminar_cliente/{id_cliente}', [ClienteMorController::class, 'destroy'])->name('destroyCliMor')->middleware('auth');
Route::get('/papelera_cliente', [ClienteMorController::class, 'recycle'])->name('recycleCliMor')->middleware('auth');
Route::get('/recuperar_cliente/{id_cliente}', [ClienteMorController::class, 'recover'])->name('recoverCliMor')->middleware('auth');

