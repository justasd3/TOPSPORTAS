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
    Route::resource('/users','UsersController',['except' => ['show','create','store']])->middleware(['auth', 'admin']);
});
Route::get('/ivykiai', [App\Http\Controllers\IvykiuController::class, 'index'])->name('ivykiai');

Route::get('/ivykiai/kurti', [App\Http\Controllers\IvykiuController::class, 'kurti'])->name('ivykiai.kurti')->middleware('can:edit');
Route::post('/ivykiai/done', [App\Http\Controllers\IvykiuController::class, 'done'])->name('ivykiai.done');

Route::get('/ivykiai/{id}', [App\Http\Controllers\IvykiuController::class, 'redaguoti'])->name('ivykiai.redaguoti')->middleware('can:edit');
Route::post('/ivykiai/redaguoti/done', [App\Http\Controllers\IvykiuController::class, 'redaguoti_done'])->name('ivykiai.redaguoti.done');

Route::get('/ivykiai/trinti/{id}', [App\Http\Controllers\IvykiuController::class, 'trinti'])->name('ivykiai.trinti')->middleware('can:edit');
Route::get('/komanda/{pavadinimas}', [App\Http\Controllers\HomeController::class, 'komanda'])->name('komanda');



Route::get('/pasiulymai', [App\Http\Controllers\PasiulymuController::class, 'index'])->name('pasiulymai');

Route::get('/pasiulymai/kurti', [App\Http\Controllers\PasiulymuController::class, 'kurti'])->name('pasiulymai.kurti');
Route::post('/pasiulymai/done', [App\Http\Controllers\PasiulymuController::class, 'done'])->name('pasiulymai.done');

Route::get('/pasiulymai/{id}', [App\Http\Controllers\PasiulymuController::class, 'redaguoti'])->name('pasiulymai.redaguoti');
Route::post('/pasiulymai/redaguoti/done', [App\Http\Controllers\PasiulymuController::class, 'redaguoti_done'])->name('pasiulymai.redaguoti.done');
Route::get('/pasiulymai/trinti/{id}', [App\Http\Controllers\PasiulymuController::class, 'trinti'])->name('pasiulymai.trinti');

/*Bet routes*/

Route::get('/createBet/playerId={pid}&eventId={eid}', 'BetController@createSubmission');
Route::post('/createBet/playerId={pid}&eventId={eid}', 'BetController@postBet');

Route::get('/editBet/playerId={pid}&betId={bid}&eventId={eid}','BetController@createEdit');
Route::post('/editBet/playerId={pid}&betId={bid}&eventId={eid}','BetController@editBet');

Route::get('/viewBet/playerId={pid}&betId={bid}','BetController@showBet');
Route::get('/allBetsPlayer/playerId={pid}','BetController@index');

Route::get('/payout/playerId={pid}&betId={bid}','BetController@payoutsGet');
Route::post('/payout/playerId={pid}&betId={bid}','BetController@payout');

# MESSSAGES
Route::get('/messages', [App\Http\Controllers\MessagesController::class, 'index'])->name('messages');
Route::get('/messages/create', [App\Http\Controllers\MessagesController::class, 'create'])->name('messages.create');
Route::get('/messages/delete/{id}', [App\Http\Controllers\MessagesController::class, 'delete'])->name('messages.delete');
Route::post('/messages/send', [App\Http\Controllers\MessagesController::class, 'send'])->name('messages.send');

# Profilis
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/detailed', [App\Http\Controllers\ProfileController::class, 'detailed'])->name('profile.detailed')->middleware('can:edit');
Route::post('/profile/detailedGet', [App\Http\Controllers\ProfileController::class, 'detailedGet'])->name('profile.detailedGet')->middleware('can:edit');
