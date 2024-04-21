<?php

use App\Http\Controllers\MessagesController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/load-latest-messages', [MessagesController::class, 'getLoadLatestMessages']);

Route::post('/send', [MessagesController::class, 'postSendMessage']);

Route::get('/fetch-old-messages', [MessagesController::class, 'getOldMessages']);

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/emit', function () {
   \App\Events\MessageSent::broadcast(\App\Models\User::find(1));
});

Auth::routes();
