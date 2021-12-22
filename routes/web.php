<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/books', [BookController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

    
Route::middleware(['auth'])->group(function () {
    Route::get('/memo', [MemoController::class, 'index'])->name('memo.index');
    Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
    Route::post('/memo', [MemoController::class, 'store'])->name('memo.store');

    Route::get('/memo/{id}', [MemoController::class, 'show'])->name('memo.show');
    Route::get('/memo/{id}/edit', [MemoController::class, 'edit'])->name('memo.edit');
    Route::put('/memo/{id}', [MemoController::class, 'update'])->name('memo.update');

    Route::delete('/memo/{id}', [MemoController::class, 'delete'])->name('memo.destroy');
});


require __DIR__ . '/auth.php';
