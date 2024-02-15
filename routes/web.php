<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
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
    Route::get('/administrator', [BukuController::class, 'index'])->middleware('userAkses:administrator');
    Route::get('/administrator/create', [BukuController::class, 'create']);
    Route::get('/petugas', [AdminController::class, 'petugas'])->middleware('userAkses:petugas');
    Route::get('/peminjam', [AdminController::class, 'peminjam'])->middleware('userAkses:peminjam');
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::resource('/administrator', BukuController::class);