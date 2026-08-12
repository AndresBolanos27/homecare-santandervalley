<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/clients', function () {
        $clients = \App\Models\User::where('role', 'patient')->latest()->paginate(10);
        return view('clients.index', compact('clients'));
    })->name('clients.index');
    
    Route::get('/users', function () {
        $users = \App\Models\User::where('role', 'admin')->latest()->paginate(10);
        return view('users.index', compact('users'));
    })->name('users.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Doctores CRUD
    Route::resource('doctors', \App\Http\Controllers\DoctorController::class)->except(['show']);
});

require __DIR__.'/auth.php';
