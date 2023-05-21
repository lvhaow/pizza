<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserOrderController;
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

Route::group(['middleware' => 'auth','admin'], function () {

    Route::controller(PizzaController::class)->group(function () {
        Route::get('/pizza', 'index')->name('pizza.index');
        Route::get('/pizza/create', 'create')->name('pizza.create');
        Route::post('/pizza/store', 'store')->name('pizza.store');
        Route::get('/pizza/{id}/edit', 'edit')->name('pizza.edit');
        Route::put('/pizza/{id}/update', 'update')->name('pizza.update');
        Route::delete('/pizza/{id}/delete', 'destroy')->name('pizza.destroy');
    });

    //Order Route All
    Route::controller(UserOrderController::class)->group(function(){
        Route::get('/user/order','index')->name('user.order');
        Route::post('/order/{id}/status','changestatus')->name('order.status');
    });
});
