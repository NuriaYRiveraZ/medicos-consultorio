<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

//AGENDA

use App\Http\Controllers\AgendaController;

Route::get('/agendas/create', [AgendaController::class, 'create'])->name('agendas.create');
Route::post('/agendas/store', [AgendaController::class, 'store'])->name('agendas.store');



//USUARIOS
use App\Http\Controllers\UsersController;

Route::middleware(['auth'])->group(function () {
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});

#Menu de la parte de arriba

// Route::get('/', [MenuController::class, 'welcome'])->middleware(['auth', 'verified'])->name('welcome');

Route::get('/dashboard', [MenuController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pacientes', [MenuController::class, 'pacientes'])->middleware(['auth', 'verified'])->name('pacientes');

Route::get('/productos', [MenuController::class, 'productos'])->middleware(['auth', 'verified'])->name('productos');

Route::get('/usuarios', [MenuController::class, 'usuarios'])->middleware(['auth', 'verified'])->name('usuarios');

#Pestaña de pacientes

Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients/store', [PatientController::class, 'store'])->name('patients.store');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');

#citas

Route::get('/cita/agendar',[CitaController::class, 'agendar_cita'])->middleware(['auth', 'verified'])->name('agendar_cita');

Route::get('/cita/agandar', [CitaController::class, 'create'])->name('cita.agendar');

Route::post('/cita', [CitaController::class, 'store'])->name('cita.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
