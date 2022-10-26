<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(static function(){
    Route::get('/vendedores',[App\Http\Controllers\vendedoresApiController::class,'index']);
    Route::post('/vendedores',[App\Http\Controllers\vendedoresApiController::class,'store']);
    Route::delete('/vendedores/{id}',[App\Http\Controllers\vendedoresApiController::class,'destroy']);
    Route::get('/vendedores/{id}',[App\Http\Controllers\vendedoresApiController::class,'show']);
    Route::put('/vendedores/{id}',[App\Http\Controllers\vendedoresApiController::class,'update']);

//____________________________________________________________________________
//Clientes

Route::get('/clientes',[App\Http\Controllers\clientesApiController::class,'index']);
    Route::post('/clientes',[App\Http\Controllers\clientesApiController::class,'store']);
    Route::delete('/clientes/{id}',[App\Http\Controllers\clientesApiController::class,'destroy']);
    Route::get('/clientes/{id}',[App\Http\Controllers\clientesApiController::class,'show']);
    Route::put('/clientes/{id}',[App\Http\Controllers\clientesApiController::class,'update']);


//__________________________________________________________________________________________________

Route::get('/produtos',[App\Http\Controllers\produtosApiController::class,'index']);
    Route::post('/produtos',[App\Http\Controllers\produtosApiController::class,'store']);
    Route::delete('/produtos/{id}',[App\Http\Controllers\produtosApiController::class,'destroy']);
    Route::get('/produtos/{id}',[App\Http\Controllers\produtosApiController::class,'show']);
    Route::put('/produtos/{id}',[App\Http\Controllers\produtosApiController::class,'update']);



});