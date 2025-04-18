<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\OtherController;
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
 
// Grouping routes

// Public views
Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/loans/status', 'statusLoans')->name('loans.status');
    Route::get('/books/show/{libro}', 'show')->name('show.books');
    Route::get('/view-books/category/{category}', 'view')->name('view.category');
    Route::get('/books/search', 'find')->name('search.books');
});

// (Library user => CRUD)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(LibroController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/dashboard/book/create', 'create')->name('dashboard.create');
        Route::get('/dashboard/book/{libro}/edit', 'edit')->name('dashboard.edit');
        Route::get('/dashboard/books/show', 'show')->name('dashboard.show');

        // Print reports
        Route::get('/dashboard/print', [LibroController::class, 'print'])->name('dashboard.print');
    });
    
    // Url Reportes
    Route::controller(InventoryController::class)->group(function () {
        Route::get('/dashboard/cambiar-cabezera-footer', 'update')->name('inventory.pie');
        Route::get('/dashboard/print/pdf_inventario', 'printInventory')->name('inventory.printInventory');
        Route::get('/dashboard/print/pdf_loans', 'printLoans')->name('inventory.printLoans');
    });

    // Routes for loans
    Route::controller(PrestamoController::class)->group(function () {
        Route::get('/dashboard/loans/view', 'index')->name('loans.index');
        Route::get('/dashboard/loans', 'create')->name('loans.create');
        Route::get('/dashboard/loans/show', 'show')->name('loans.show');
        Route::get('/dashboard/loans/{prestamo}/update', 'edit')->name('loans.update');
        Route::get('/dashboard/loans/{prestamo}/show', 'showStudent')->name('loans.student');
        Route::get('/dahsboard/loans-quarterly', 'show')->name('loans.quarterly');
    });
});

// (Super-User => you can update the student database and delete other inactive users)
Route::middleware(['auth', 'verified', 'role'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/show', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/activities', [AdminController::class, 'activities'])->name('admin.activities');
    Route::get('/admin/edit-user/{user}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/admin/create', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/create-user', [AdminController::class, 'create'])->name('admin.user');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';