<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// role
Route::get('admin', function () {
    return redirect()->route('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin');

// permission
Route::get('penulis', function () {
    return redirect()->route('dashboard');
})->middleware(['auth', 'verified', 'role:penulis|admin'])->name('penulis');

// role or permission
Route::get('user', function () {
    return redirect()->route('dashboard');
})->middleware(['auth', 'verified', 'role_or_permission:lihat-tulisan'])->name('user');


// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Notes routes
Route::middleware(['auth'])->group(function () {
    Route::resource('notes', NoteController::class);
});

Route::get('/notes/export/pdf', [NoteController::class, 'exportPdf'])->name('notes.export.pdf');