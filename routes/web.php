<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserOrderController;
use GuzzleHttp\Middleware;
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

Auth::routes();

Route::group(["middleware" =>'auth', 'admin'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/pizza', [PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/create', [PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/pizza/store', [PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/pizza/{id}/edit', [PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('pizza/{id}/update', [PizzaController::class, 'update'])->name('pizza.update');
    Route::delete('pizza/{id}/destroy', [PizzaController::class, 'destroy'])->name('pizza.destroy');
    Route::get('user/order', [UserOrderController::class, 'index'])->name('order.index');
});

