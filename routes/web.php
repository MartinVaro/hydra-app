<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\ComentarioController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/', [ProyectoController::class, 'home']);
Route::get('/search', [ProyectoController::class, 'search'])->name('searchindex');
Route::get('/categoria/ambiente', [ProyectoController::class, 'search_ambiente'])->name('trindex');
Route::get('/categoria/universo', [ProyectoController::class, 'search_universo'])->name('trindex');
Route::get('/categoria/educacion', [ProyectoController::class, 'search_educacion'])->name('trindex');
Route::get('/categoria/sustentable', [ProyectoController::class, 'search_sustentable'])->name('trindex');
Route::get('/categoria/tecnologico', [ProyectoController::class, 'search_tecnologico'])->name('trindex');
Route::get('/categoria/energia', [ProyectoController::class, 'search_energia'])->name('trindex');
Route::get('/categoria/salud', [ProyectoController::class, 'search_salud'])->name('trindex');
Route::get('/categoria/sociedad', [ProyectoController::class, 'search_sociedad'])->name('trindex');


Route::get('/profile', function(){
    return view('profile');

});

Route::resource('proyecto', ProyectoController::class);
Route::resource('comentario', ComentarioController::class);
Route::resource('donacion', DonacionController::class);
Route::resource('calificacion', CalificacionController::class);
Route::get('/admin', [UserController::class, 'index'])->middleware('can:dashboard');
Route::get('/admin/proyectos', [ProyectoController::class, 'admin'])->middleware('can:allproyect');
Route::resource('user', UserController::class)->middleware('can:dashboard')->names('users');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
