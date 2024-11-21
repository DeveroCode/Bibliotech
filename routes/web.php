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
    Route::get('/books/search', 'find')->name('search.books');
});

// (Library user => CRUD)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [LibroController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/book/create', [LibroController::class, 'create'])->name('dashboard.create');
    Route::get('/dashboard/book/{libro}/edit', [LibroController::class, 'edit'])->name('dashboard.edit');
    Route::get('/dashboard/books/show', [LibroController::class, 'show'])->name('dashboard.show');

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

});
    // Router for Mari
  /*   Route::get('/dashboard/mari/regis', [UserinputController::class, 'index'])->name('dashboard.mari.regis');
    Route::get('/dashboard/mari/show', [UserinputController::class, 'show'])->name('dashboard.mari.show'); */

    // Routes for registers
   Route::get('/dashboard/regist', [OtherController::class, 'see'])->name('dashboard.regist');
   



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
