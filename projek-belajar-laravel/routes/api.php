<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// show all
Route::get('/product', [ProductController::class, 'index']);
// show by id
Route::get('/product/{id}', [ProductController::class, 'show']);
// store or create
Route::post('/product', [ProductController::class, 'store']);
// update
Route::put('/product/{id}', [ProductController::class, 'update']);
// delete
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
