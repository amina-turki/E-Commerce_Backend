<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ArticleController;
use App\Http\Middleware;
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


Route::apiResource('client','App\Http\Controllers\ClientController');
//http://localhost:8080/Ecommerce/public/api/client

Route::middleware('api')->group(function () {
    Route::resource('clients', ClientController::class);
    Route::get('/AfficherById/{id}', [ClientController::class, 'showById']); // url:http://localhost:8080/Ecommerce/public/api/AfficherById/1
    Route::delete('/SupprimerById/{id}', [ClientController::class, 'deleteById']); // url:http://localhost:8080/Ecommerce/public/api/SupprimerById/1
    Route::post('/CreerClinet', [ClientController::class, 'storeByAtt']); // url:http://localhost:8080/Ecommerce/public/api/CreerClinet
    Route::put('/Modifier/{id}', [ClientController::class, 'update2']); // url:http://localhost:8080/Ecommerce/public/api/Modifier/2
    
});

//Route::get('showById/{id}','App\Http\Controllers\ClientController@showById');  url:http://localhost:8080/Ecommerce/public/api/showById/1


Route::middleware('api')->group(function () {
    Route::resource('commandes', CommandeController::class);
    //// url:http://localhost:8080/Ecommerce/public/api/commandes/
});


Route::middleware('api')->group(function () {
    Route::resource('factures', FactureController::class);
    //// url:http://localhost:8080/Ecommerce/public/api/factures/
});


Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
    //// url:http://localhost:8080/Ecommerce/public/api/categories/
});


Route::middleware('api')->group(function () {
    Route::resource('articles', ArticleController::class)->middleware('CORS');
    //// url:http://localhost:8080/Ecommerce/public/api/articles/
    Route::post('/Creerarticle', [ArticleController::class, 'storeByAtt']); // url:http://localhost:8080/Ecommerce/public/api/Creerarticle

});
Route::get('/users/get-data','UserController@getData')->middleware('Cors');

Route::get('/', function () {
    return 'jjjjj';
});
