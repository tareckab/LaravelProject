<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;
Route::resource('bank', BankController::class);
Route::get('/bank', [BankController::class, 'index'])->name('bank.index');

Route::resource('usuarios', UsuariosController::class);

Route::get('/', function () {
    return view('welcome');     
});

Route::get('/home', function () {
    return view('home'); 
})->name('home');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
