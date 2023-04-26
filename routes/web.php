<?php

use App\Http\Controllers\ShortnerController;
use App\Http\Middleware\UrlIsReachable;
use App\Http\Requests\ShortnerRequest;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::controller(ShortnerController::class)->name('shortner.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::post('/shortner', 'store')
        ->name('store')
        ->middleware(UrlIsReachable::class);
    
    Route::get('/shortner', 'show')
        ->name('show');

    Route::get('/{uri}', 'redirect')
        ->name('redirect');
});



