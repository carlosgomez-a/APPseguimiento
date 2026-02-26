<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('alternativasep/reporte', [\App\Http\Controllers\alternativasepController::class, 'generarReporte'])->name('alternativasep.reporte');use App\Http\Controllers\regionalesController; Route::resource('regionales', regionalesController::class);
use App\Http\Controllers\programasdeformacionController; Route::resource('programasdeformacion', programasdeformacionController::class);
use App\Http\Controllers\tiposdocumentosController; Route::resource('tiposdocumentos', tiposdocumentosController::class);
use App\Http\Controllers\rolesadministrativosController; Route::resource('rolesadministrativos', rolesadministrativosController::class);
use App\Http\Controllers\epsController; Route::resource('eps', epsController::class);
use App\Http\Controllers\subalternativasepController; Route::resource('subalternativasep', subalternativasepController::class);
use App\Http\Controllers\aprendicesController;Route::resource('aprendices', aprendicesController::class);
use App\Http\Controllers\centroformacionController;Route::resource('centroformacion', centroformacionController::class);
use App\Http\Controllers\enteconformadorController;Route::resource('enteconformador', enteconformadorController::class);
use App\Http\Controllers\fichascaracterizacionController;Route::resource('fichascaracterizacion', fichascaracterizacionController::class);
use App\Http\Controllers\instructoresController;Route::resource('instructores', instructoresController::class);



#use App\Http\Controllers\alternativasepController;Route::resource('alternativasep', alternativasepController::class);










