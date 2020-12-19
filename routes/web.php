<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::resource('/users','UsersController',['except' => ['show','create','store']]);
});
Route::get('/ivykiai', [App\Http\Controllers\IvykiuController::class, 'index'])->name('ivykiai');

Route::get('/ivykiai/kurti', [App\Http\Controllers\IvykiuController::class, 'kurti'])->name('ivykiai.kurti');
Route::post('/ivykiai/done', [App\Http\Controllers\IvykiuController::class, 'done'])->name('ivykiai.done');

Route::get('/ivykiai/{id}', [App\Http\Controllers\IvykiuController::class, 'redaguoti'])->name('ivykiai.redaguoti');
Route::post('/ivykiai/redaguoti/done', [App\Http\Controllers\IvykiuController::class, 'redaguoti_done'])->name('ivykiai.redaguoti.done');

Route::get('/ivykiai/trinti/{id}', [App\Http\Controllers\IvykiuController::class, 'trinti'])->name('ivykiai.trinti');

Route::get('/pasiulymai', [App\Http\Controllers\PasiulymuController::class, 'index'])->name('pasiulymai');

Route::get('/pasiulymai/kurti', [App\Http\Controllers\PasiulymuController::class, 'kurti'])->name('pasiulymai.kurti');
Route::post('/pasiulymai/done', [App\Http\Controllers\PasiulymuController::class, 'done'])->name('pasiulymai.done');

Route::get('/pasiulymai/{id}', [App\Http\Controllers\PasiulymuController::class, 'redaguoti'])->name('pasiulymai.redaguoti');
Route::post('/pasiulymai/redaguoti/done', [App\Http\Controllers\PasiulymuController::class, 'redaguoti_done'])->name('pasiulymai.redaguoti.done');
Route::get('/pasiulymai/trinti/{id}', [App\Http\Controllers\PasiulymuController::class, 'trinti'])->name('pasiulymai.trinti');

