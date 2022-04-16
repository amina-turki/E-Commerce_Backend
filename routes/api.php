<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmplyeController;
use App\Http\Middleware;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!§
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('client','App\Http\Controllers\ClientController');
//http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/client

Route::middleware('api')->group(function () {
    Route::resource('clients', ClientController::class);
    Route::get('/AfficherById/{id}', [ClientController::class, 'showById']); // url:http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/AfficherById/1
    Route::delete('/SupprimerById/{id}', [ClientController::class, 'deleteById']); // url:http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/SupprimerById/1
    Route::post('/CreerClinet', [ClientController::class, 'storeByAtt']); // url:http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/CreerClinet
    Route::put('/Modifier/{id}', [ClientController::class, 'update2']); // url:http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/Modifier/2
    
});

//Route::get('showById/{id}','App\Http\Controllers\ClientController@showById');  url:http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/showById/1


Route::middleware('api')->group(function () {
    Route::resource('commandes', CommandeController::class);
    //// url:http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/commandes/
});


Route::middleware('api')->group(function () {
    Route::resource('factures', FactureController::class);
    //// url:http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/factures/
});


Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
    //// url:http://localhost:81/BackendEcommerce/E-Commerce_Backend/public/api/categories/

    Route::post('/Creercategories/{id}', [CategorieController::class, 'storeByAtt']); 
    // url:http:/localhost:81/BackendEcommerce/E-Commerce_Backend/public/api/Creercategories

});


Route::middleware('api')->group(function () {
    Route::resource('articles', ArticleController::class)->middleware('CORS');
    //// url:http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/articles/
    Route::post('/Creerarticle', [ArticleController::class, 'storeByAtt']); // url:http:/localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/Creerarticle
    Route::get('/recherche/{nom}', [ArticleController::class, 'recherche']); // url:http:/localhost:81/BackendEcommerce/E-Commerce_Backend/public/api/recherche/dd
    Route::get('/getArticleCat', [ArticleController::class, 'getArticleCat']); //http:/localhost:81/BackendEcommerce/E-Commerce_Backend/public/api/getArticleCat
    Route::get('/getArticleCatUnProd/{id}', [ArticleController::class, 'getArticleCatUnProd']); //http:/localhost:81/BackendEcommerce/E-Commerce_Backend/public/api/getArticleCatUnProd/1

});

Route::middleware('api')->group(function () {
    Route::resource('employes', EmplyeController::class)->middleware('CORS');
    // url: http://localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/employes/
    
    Route::post('/Creeremploye', [EmplyeController::class, 'storeByAtt']); 
    // url:http:/localhost:81//BackendEcommerce/E-Commerce_Backend/public/api/Creeremploye
    
    Route::get('/recherche/{nom}', [EmplyeController::class, 'recherche']); 
    // url:http:/localhost:81/BackendEcommerce/E-Commerce_Backend/public/api/recherche/dd
});
Route::get('/users/get-data','UserController@getData')->middleware('Cors');
