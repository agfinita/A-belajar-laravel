<?php

use App\Http\Controllers\ShowProductController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\AdminLTEController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\SearchProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function() {    // ini membuat view tanpa controller, kalau pakai controller maka harus import controller dulu
//     return view('home');
// });

// ini import controllernya untuk menampilkan view
// Route::get('/hello',[NavbarController::class, 'index']);

Route::get('/hello', [HelloController::class, 'helo']);

Route::get('/biodata', [BiodataController::class, 'bio']);

Route::get('/master', [AdminLTEController::class, 'tampil']);

// Create product
Route::get('/master/create', [AddProductController::class, 'addShow']);
// Display product
Route::get('/master/table', [ShowProductController::class, 'readShow']);
// Post form create product
Route::post('/master/table', [ShowProductController::class, 'addProcess']);
// Update product
Route::get('/master/edit/{id}', [ShowProductController::class, 'update']);
Route::patch('/master/edit/{id}', [ShowProductController::class, 'updateProcess']);
// Delete product
Route::delete('/master/table/{id}', [ShowProductController::class, 'delete']);
// Fitur search
Route::get('/master/search', [SearchProductController::class, 'search']);


Route::get('/master/table/category', [CategoryController::class, 'index']);
