<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

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

Route::get('/', [BooksController::class, 'index']);

Route::prefix('book')->group(function() {
    Route::get('/', [BooksController::class, 'create']);
    Route::post('/', [BooksController::class, 'store']);
    
    Route::post('{id}', [BorrowController::class, 'store']);
    Route::patch('{id}', [BorrowController::class, 'update']);
});

Route::prefix('edit')->group(function() {
    Route::get('{id}', [BooksController::class, 'edit']);
    Route::patch('{id}', [BooksController::class, 'update']);
    Route::delete('{id}', [BooksController::class, 'destroy']);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
