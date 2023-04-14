<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');
// Grouping routes

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [LibroController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [LibroController::class, 'create'])->name('dashboard.create');
    Route::get('/dashboard/{libro}/edit', [LibroController::class, 'edit'])->name('dashboard.edit');
    Route::get('/dashboard/show-list-books', [LibroController::class, 'showLibros'])->name('dashboard.show');
    Route::get('/dashboard/print', [LibroController::class, 'print'])->name('dashboard.print');
    Route::get('/dashboard/print/PDF', [LibroController::class, 'printPDF'])->name('dashboard.printPDF');
    Route::get('/dashboard/lending', [LibroController::class, 'lending'])->name('dashboard.lending');
});

// show books for everyone
Route::get('/books/show/{libro}', [LibroController::class, 'show'])->name('show.books');
Route::get('/books/search', [LibroController::class, 'search'])->name('search.books');
// Route::get('/dashboard', [LibroController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
