<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Rutas de la consultas SQL
Route::get('/insertar-datos', [PedidoController::class, 'insertarDatos']);
Route::get('/pedidos-usuario-id2', [PedidoController::class, 'pedidosUsuarioID2']);
Route::get('/pedidos-con-usuarios', [PedidoController::class, 'pedidosConUsuarios']);
Route::get('/pedidos-por-rango', [PedidoController::class, 'pedidosPorRango']);
Route::get('/usuarios-con-r', [PedidoController::class, 'usuariosConR']);
Route::get('/total-pedidos-usuario5', [PedidoController::class, 'totalPedidosUsuario5']);
Route::get('/pedidos-ordenados', [PedidoController::class, 'pedidosOrdenados']);
Route::get('/suma-total-pedidos', [PedidoController::class, 'sumaTotalPedidos']);
Route::get('/pedido-mas-economico', [PedidoController::class, 'pedidoMasEconomico']);
Route::get('/pedidos-agrupados', [PedidoController::class, 'pedidosAgrupadosPorUsuario']);