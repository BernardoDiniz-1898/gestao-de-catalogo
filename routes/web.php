<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipamentosController;
use Illuminate\Support\Facades\Route;

// Redireciona a raiz para a lista ou para o login
Route::get('/', function () {
    return auth()->check() ? redirect()->route('equipamentos.index') : redirect()->route('login');
});

// Rotas para quem NÃO está logado
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Rotas protegidas
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // CRUD de Equipamentos
    Route::resource('equipamentos', EquipamentosController::class);
});
