<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaperController;
use App\Http\Livewire\MostarPaperRevisor;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MostarPaperRevisorController;

Route::get('/', function () {
    return view('welcome');
});

// Eventos
Route::get('/dashboard', [EventoController::class, 'index'])->middleware(['auth', 'verified'])->name('eventos.index');
Route::get('/eventos/create', [EventoController::class, 'create'])->middleware(['auth', 'verified', 'rol.admin'])->name('eventos.create');
Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->middleware(['auth', 'verified'])->name('eventos.edit');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');
 
// Papers
Route::get('/papers/{evento}', [PaperController::class, 'index'])->middleware(['auth', 'verified'])->name('papers.index');
Route::get('/paper/{paper}', [PaperController::class, 'show'])->middleware(['auth', 'verified'])->name('paper.show');
Route::get('/paper/calificacion/{paper}', [PaperController::class, 'resultado'])->middleware(['auth', 'verified'])->name('paper.resultado');
Route::get('/mispaper', [PaperController::class, 'index'])->middleware(['auth', 'verified'])->name('mispaper.index');
Route::get('/paper/verdetalle/{paper}', [PaperController::class, 'detalle'])->middleware(['auth', 'verified'])->name('paper.detalle');

// Revisores 
Route::get('/reviewer', [MostarPaperRevisorController::class, 'index'])->middleware(['auth', 'verified'])->name('revisor.index');
Route::get('/reviewer/{paper}', [MostarPaperRevisorController::class, 'show'])->middleware(['auth', 'verified'])->name('revisor.show');

 Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
