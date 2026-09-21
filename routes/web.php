<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\LoanController as AdminLoanController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('books.index');
    }
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    // Dashboard redirect
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('books.index');
    })->name('dashboard');

    // Profile (dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Katalog Buku
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

    // Peminjaman User
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::post('/loans/{book}', [LoanController::class, 'store'])->name('loans.store');
    Route::patch('/loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');
});

// Route Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('books', AdminBookController::class);
    Route::resource('categories', AdminCategoryController::class)->only(['index', 'store', 'destroy']);

    Route::get('loans', [AdminLoanController::class, 'index'])->name('loans.index');
    Route::patch('loans/{loan}/approve', [AdminLoanController::class, 'approve'])->name('loans.approve');
    Route::patch('loans/{loan}/reject', [AdminLoanController::class, 'reject'])->name('loans.reject');
});

require __DIR__.'/auth.php';