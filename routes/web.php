<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controllers - Auth
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Controllers - Administrativos
use App\Http\Controllers\aprendicesController;
use App\Http\Controllers\alternativasepController;
use App\Http\Controllers\centroformacionController;
use App\Http\Controllers\enteconformadorController;
use App\Http\Controllers\epsController;
use App\Http\Controllers\fichascaracterizacionController;
use App\Http\Controllers\instructoresController;
use App\Http\Controllers\programasdeformacionController;
use App\Http\Controllers\regionalesController;
use App\Http\Controllers\rolesadministrativosController;
use App\Http\Controllers\subalternativasepController;
use App\Http\Controllers\tiposdocumentosController;

// Models
use App\Models\aprendices;
use App\Models\instructores;
use App\Models\programasdeformacion;
use App\Models\alternativasep;
use App\Models\centroformacion;
use App\Models\enteconformador;
use App\Models\eps;
use App\Models\fichascaracterizacion;
use App\Models\regionales;
use App\Models\rolesadministrativos;
use App\Models\subalternativasep;
use App\Models\tiposdocumentos;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'));

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación (Login / Logout)
|--------------------------------------------------------------------------
*/
// Mostrar formulario de login (solo para invitados)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    // ✅ RUTA QUE FALTABA: procesar el formulario de login
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Cerrar sesión
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas Autenticadas (Requieren Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // 🔁 Redirección inteligente según rol
    Route::get('/redirect', function () {
        $rol = Auth::user()->role_id;

        if (in_array($rol, [1, 2, 3, 4])) {
            return redirect()->route('dashboard');
        }

        if ($rol == 5) {
            return redirect()->route('aprendiz.inicio');
        }

        abort(403, 'Rol no autorizado.');
    })->name('redirect');


    // --- Dashboard (roles 1–4) ---
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'totalAprendices'      => aprendices::count(),
            'totalInstructores'    => instructores::count(),
            'totalProgramas'       => programasdeformacion::count(),
            'totalAlternativas'    => alternativasep::count(),
            'totalCentros'         => centroformacion::count(),
            'totalEnte'            => enteconformador::count(),
            'totalEps'             => eps::count(),
            'totalFichas'          => fichascaracterizacion::count(),
            'totalRegionales'      => regionales::count(),
            'totalRoles'           => rolesadministrativos::count(),
            'totalSubalternativas' => subalternativasep::count(),
            'totalTiposDocumentos' => tiposdocumentos::count(),
        ]);
    })->middleware(['role:1,2,3,4'])->name('dashboard');


    // --- Inicio del aprendiz (rol 5) ---
    Route::get('/inicio', function () {
        $aprendiz = aprendices::where('NumeroDoc', Auth::user()->NumeroDoc)->first();

        return $aprendiz
            ? redirect()->route('aprendiz.mis-datos.edit', $aprendiz->NIS)
            : view('aprendices.pendiente');
    })->middleware(['role:5'])->name('aprendiz.inicio');


    // --- Rutas administrativas (roles 1–4) ---
    Route::middleware(['role:1,2,3,4'])->group(function () {
        Route::resource('aprendices',            aprendicesController::class);
        Route::resource('alternativasep',        alternativasepController::class);
        Route::resource('centroformacion',       centroformacionController::class);
        Route::resource('enteconformador',       enteconformadorController::class);
        Route::resource('eps',                   epsController::class);
        Route::resource('fichascaracterizacion', fichascaracterizacionController::class);
        Route::resource('instructores',          instructoresController::class);
        Route::resource('programasdeformacion',  programasdeformacionController::class);
        Route::resource('regionales',            regionalesController::class);
        Route::resource('rolesadministrativos',  rolesadministrativosController::class);
        Route::resource('subalternativasep',     subalternativasepController::class);
        Route::resource('tiposdocumentos',       tiposdocumentosController::class);
    });


    // --- Rutas del aprendiz (SOLO rol 5) ---
    Route::middleware(['auth'])->group(function () {
        Route::get('/mis-datos/{id}/edit', [aprendicesController::class, 'edit'])
            ->name('aprendiz.mis-datos.edit');
        Route::put('/mis-datos/{id}', [aprendicesController::class, 'update'])
            ->name('aprendiz.mis-datos.update');
    });


    // --- Perfil de Usuario ---
    Route::controller(ProfileController::class)->prefix('profile')->group(function () {
        Route::get('/',    'edit')->name('profile.edit');
        Route::patch('/',  'update')->name('profile.update');
        Route::delete('/', 'destroy')->name('profile.destroy');
    });
});
