<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\TransportServiceController;
use App\Http\Controllers\HotelController;

// ✅ Ruta principal (home) sin duplicados
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ✅ Dashboard con middleware de autenticación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Grupo de rutas protegidas con autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Rutas para administradores
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('paquetes', PaqueteController::class);
    Route::resource('transport-services', TransportServiceController::class);
    Route::resource('hotels', HotelController::class);
});

// ✅ Otras rutas públicas
// Route::get('/elsalvador', function () {
//     return view('elsalvador');
// })->name('elsalvador');

Route::get('/elsalvador', [PaqueteController::class, 'elsalvador'])->name('elsalvador');
Route::get('/transporte', [TransportServiceController::class, 'transporte'])->name('transporte');
Route::get('/hoteles', [HotelController::class, 'hoteles'])->name('hoteles');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



require __DIR__.'/auth.php';
