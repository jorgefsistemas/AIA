<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\TaxiOperadores;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Cancelacion\Placa;
use App\Http\Livewire\Registro\AltaRegistros;
use App\Http\Livewire\Cancelacion\BusquedaSabana;
use App\Http\Livewire\Registros\ImprimirRegistros;
use App\Http\Controllers\Tramite\TramiteController;
use App\Http\Livewire\Cancelacion\PlacaCancelaciones;
use App\Http\Livewire\Cancelacion\BusquedaMovimientos;
use App\Http\Controllers\Linea_captura\GeneraLController;
use App\Http\Livewire\Cancelacion\CancelacionMovimientos;
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
if(config('app.env') == 'production'){
    URL::forceScheme('https');
}

Route::get('/', function () {
    return redirect()->route('home');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('cancelacion')->middleware(['role:sistemas'])->group(function () {
Route::get('/placa', Placa::class)->name('placa');
});
Route::prefix('cancelacion')->middleware(['role:sistemas'])->group(function () {
    Route::get('placa_cancelaciones', PlacaCancelaciones::class)->name('placa_cancelaciones');
});

// Cancelacion movimientos
Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');

Route::prefix('cancelacion')->middleware(['role:sistemas'])->group(function () {
    Route::get('/cancelacion_movimientos', CancelacionMovimientos::class)->name('cancelacion_movimientos');
    Route::get('/busqueda_sabanas', BusquedaSabana::class)->name('busqueda_sabanas');
    Route::get('constancia_cancelacion/{tramite?}',[HomeController::class,'constancia_cancelacion'])->name('pdf:constancia_cancelacion');

});
Route::prefix('cancelacion')->middleware(['role:sistemas'])->group(function () {
    Route::get('/busqueda_movimientos', BusquedaMovimientos::class)->name('busqueda_movimientos');
});


// cambios de registro dos

Route::prefix('registros')->middleware(['role:sistemas'])->group(function () {
    Route::get('/alta_registros', AltaRegistros::class)->name('alta_registros');
});

