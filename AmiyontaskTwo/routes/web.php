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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/generate', [App\Http\Controllers\GeneratedURLController::class, 'create'])->name('generate');

Route::post('/access', [App\Http\Controllers\GeneratedURLController::class, 'accessLink'])->name('accesslink');

Route::get('/generate', [App\Http\Controllers\GeneratedURLController::class, 'index'])->name('generatedlinks');
