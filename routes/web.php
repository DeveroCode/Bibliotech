<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrimestreController;
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

// (Library user => CRUD)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [LibroController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/book/create', [LibroController::class, 'create'])->name('dashboard.create');
    Route::get('/dashboard/book/{libro}/edit', [LibroController::class, 'edit'])->name('dashboard.edit');
    Route::get('/dashboard/books/show', [LibroController::class, 'showLibros'])->name('dashboard.show');

    // Url Reportes
    Route::get('/dashboard/print', [LibroController::class, 'print'])->name('dashboard.print'); // Index
    Route::get('/dashboard/cambiar-cabezera-footer', [InventoryController::class, 'update'])->name('inventory.pie');
    Route::get('/dashboard/print/pdf_inventario', [InventoryController::class, 'printInventory'])->name('inventory.printInventory');
    Route::get('/dashboard/print/pdf_loans', [InventoryController::class, 'printLoans'])->name('inventory.printLoans');

    // Routes for loans
    Route::get('/dashboard/loans/view', [PrestamoController::class, 'index'])->name('loans.index');
    Route::get('/dashboard/loans', [PrestamoController::class, 'create'])->name('loans.create');
    Route::get('/dashboard/loans/show', [PrestamoController::class, 'show'])->name('loans.show');
    Route::get('/dashboard/loans/{prestamo}/update', [PrestamoController::class, 'edit'])->name('loans.update');
    Route::get('/dashboard/loans/{prestamo}/show', [PrestamoController::class, 'showStudent'])->name('loans.student');

    // Routes for registers
    Route::get('/dashboard/regist', [TrimestreController::class, 'index']);
});

// (Super-User => you can update the student database and delete other inactive users)
Route::middleware(['auth', 'verified', 'role'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/create-user', [AdminController::class, 'createUser'])->name('admin.user');
});

// show books for everyone
Route::get('/loans/status', [PrestamoController::class, 'statusLoans'])->name('loans.status');
Route::get('/books/show/{libro}', [LibroController::class, 'show'])->name('show.books');
Route::get('/books/search', [LibroController::class, 'search'])->name('search.books');

Route::get('/graphs', [GraphController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
