<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::controller(PizzaController::class)->group(function(){
    Route::get('/pizza', 'index')->name('pizza.index');
    Route::get('/pizza/create', 'create')->name('pizza.create');
    Route::post('/pizza/store', 'store')->name('pizza.store');
});
