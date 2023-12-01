<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminLTEController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\ShowProductController;

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
    return view('hello');
});

Route::get('/biodata',function() {
    return view('biodata');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminLTEController::class, 'index']);
    Route::get('/search', [SearchProductController::class, 'search']);
    // create
    Route::get('/create', [ShowProductController::class, 'create']);
    // show or read
    Route::get('/product', [ShowProductController::class, 'index']);
    // insert
    Route::post('/product', [ShowProductController::class, 'insert']);
    // update
    Route::get('/product/edit/{id}', [ShowProductController::class, 'update']);
    Route::patch('/product/edit/{id}', [ShowProductController::class, 'updateProcess']);
    // delete
    Route::delete('/product/{id}', [ShowProductController::class, 'delete']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
