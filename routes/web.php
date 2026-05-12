<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\JugadorController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('equipos', EquipoController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');   // ← Cambia 'equipos' por 'dashboard'
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('equipos', EquipoController::class);
});

Route::post('jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
Route::delete('jugadores/{jugador}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');

Route::get('jugadores/{jugador}/edit', [JugadorController::class, 'edit'])->name('jugadores.edit');
Route::put('jugadores/{jugador}', [JugadorController::class, 'update'])->name('jugadores.update');

Route::get('/estadisticas', [EquipoController::class, 'estadisticas'])
     ->name('estadisticas')
     ->middleware('auth');

require __DIR__ . '/auth.php';

Route::post('/equipos/exportar-pdf', [EquipoController::class, 'exportarPDF'])->name('equipos.pdf');
