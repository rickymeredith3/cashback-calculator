<?php

use Illuminate\Support\Facades\Rout;
use App\Http\Controllers\CardController;
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

Route::get('/', [CardController::class, 'dash'])->name('dashboard');

Route::prefix('/api')->group(function () {
	Route::post('/card', [CardController::class, 'storeCard']);
	Route::post('/card/{card}', [CardController::class, 'storeCard']);
	Route::get('/card/{card}', [CardController::class, 'getCard']);
	Route::get('/calculate/{category}', [CardController::class, 'calculate']);
	Route::get('/card/{card}/delete', [CardController::class, 'delete']);
});