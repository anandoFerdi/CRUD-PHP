<?php

use App\Http\Controllers\NegaraController;
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


// Route::get('/negara',[NegaraController::class,'index']);
// Route::get('/negara/create',[NegaraController::class,'create']);
// Route::post('/negara/store',[NegaraController::class,'store']);

// Route::resource('negara', NegaraController::class);
// Route::resource('/negara', \App\Http\Controllers\NegaraController::class);


Route::middleware(['auth'])->group(function(){
    Route::resource('negara', NegaraController::class);
    Route::resource('/negara', \App\Http\Controllers\NegaraController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
