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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
    Route::resource('departamentos', App\Http\Controllers\DepartamentoController::class);
    Route::resource('asignaciones', App\Http\Controllers\AsignacioneController::class);
});

Auth::routes();


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
