<?php

use App\Http\Controllers\AlgorithmController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function() {

    Route::get('/algorithm', [AlgorithmController::class, 'form'])->name('algorithm.form');
    Route::post('/algorithm_ajax', [AlgorithmController::class, 'logic'])->name('algorithm.logic');

    Route::resource('product', ProductController::class)->except('destroy');
    Route::get('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');


});
require __DIR__.'/auth.php';
