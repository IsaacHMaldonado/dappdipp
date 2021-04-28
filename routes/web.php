<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\OficiosController;
use App\Http\Controllers\AttNotasController;
use App\Http\Controllers\CircularesController;
use App\Http\Controllers\CatUnidadesController;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
    Route::get("/dashboard", function () {
        return Inertia::render('Dashboard');
    })->name("dashboard");

    Route::resource("directorio", DirectorioController::class)->except(["show"]);
    Route::resource("Oficios", OficiosController::class)->except(["show"]);
    Route::resource("AttNotas", AttNotasController::class)->except(["show"]);
    Route::resource("Circulares", CircularesController::class)->except(["show"]);
    Route::resource("unidades", CatUnidadesController::class)->except(["show"]);
});
