<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Calzado;
use App\Models\prueba;
use App\Http\Controllers\PruebaController;
;

use App\Models\Cliente;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('prueba', function () {
//     $calzados = Calzado::select('id','nombre')
//     ->where('calzados.id','=',1)->get();
//     return $calzados[0]->nombre;
// });

// Route::get('prueba', function($id) {
//     $cliente = Cliente::findOrFail($id);
//     return $cliente ;
// });

Route::get('prueba',[PruebaController::class,'buscarCliente']);
