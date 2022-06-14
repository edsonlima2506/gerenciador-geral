<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ClientsController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Calendar 
    Route::get('/calendar', [CalendarController::class, 'index']);

    // Clients 
    Route::get('/clients', [ClientsController::class, 'index']);
    Route::post('/clients/store', [ClientsController::class, 'store']);
});
