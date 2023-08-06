<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
// This route is only accessible by users with the 'admin' role.
Route::middleware(['auth'])->group(function () {
    //Routes All User
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    //Route User Tambahan Selain Resources Laravel
    Route::get('/users/editPassword/{id}', [UserController::class, 'editPassword'])->name('editPassword');
    Route::put('/users/editPassword/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
    //User All Routes
    Route::resource('users', UserController::class);
    // routing url untuk mengunduh data dalam format EXCEL
    Route::get('users-excel', [UserController::class, 'usersExcel']);
    Route::get('absensi-excel', [AbsensiController::class, 'absensiExcel']);
    Route::get('absensi-excel', [AbsensiController::class, 'absensiExcel']);
    // Absensi Routes
    Route::get('/absensi/{nama}', [AbsensiController::class, 'index']);
    Route::post('absensi/store', [AbsensiController::class, 'store']);
    Route::get('/absensi/update/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
    //export excel
    Route::get('/absen-excel', [AbsensiController::class, 'export']);
    Route::get('/user-excel', [UserController::class, 'export']);
});
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
