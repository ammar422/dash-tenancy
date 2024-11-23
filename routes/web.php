<?php

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



foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        // your actual routes
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/test', fn() => 'this is test');
    });
}
