<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SesiController;
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

Route::middleware(['guest'])->group(function() {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::get('/home', function() {
    return redirect('admin');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/administrator', [AdminController::class, 'administrator'])->middleware('userAkses:administrator');
    Route::get('/petugas', [AdminController::class, 'petugas'])->middleware('userAkses:petugas');
    Route::get('/peminjam', [AdminController::class, 'peminjam'])->middleware('userAkses:peminjam');
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/create', [RegisterController::class, 'create']);
