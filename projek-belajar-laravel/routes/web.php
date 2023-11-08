<?php

use App\Http\Controllers\AdminLTEController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\HelloController;
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

Route::get('/adminLTE/master', [AdminLTEController::class, 'tampil']);