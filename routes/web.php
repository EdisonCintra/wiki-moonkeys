<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\WikiViewer;
use Livewire\Volt\Volt;

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Volt::route('categorias', 'categorias')
    ->middleware(['auth', 'verified'])
    ->name('categorias');



// Rota pública (fora do middleware auth)
Route::get('/', WikiViewer::class)->name('home');




require __DIR__.'/settings.php';
