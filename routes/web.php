<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\DniController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Models\User;


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
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard', ['canregister' => Route::has('register')]);
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('/paciente', PacienteController::class)->names([
        'index' => 'paciente.index',
        'create' => 'paciente.create',
        'store' => 'paciente.store',
        'show' => 'paciente.show',
        'edit' => 'paciente.edit',
        'update' => 'paciente.update',
        'destroy' => 'paciente.destroy',
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('/cita', CitasController::class)->names([
        'index' => 'cita.index',
        'create' => 'cita.create',
        'store' => 'cita.store',
        'show' => 'cita.show',
        'edit' => 'cita.edit',
        'update' => 'cita.update',
        'destroy' => 'cita.destroy',
    ])->parameter('cita', 'cita');;
});

Route::post('/dni', [DniController::class, 'buscar']);
