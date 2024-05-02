<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PaymentDateController;
use App\Http\Controllers\PaymentVendorController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SalaryKController;
use App\Http\Controllers\VendorController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [Controller::class, 'index']);
    Route::get('change-password', [AuthController::class, 'change']);
    Route::put('change-password/{id_account}', [AuthController::class, 'Postchange']);
    Route::prefix('setting/role')->group(function () {
        Route::get('/', [AuthController::class, 'index']);
        Route::post('/', [AuthController::class, 'add']);
        Route::put('edit/{id_account}', [AuthController::class, 'edit']);
        Route::delete('delete/{id_account}', [AuthController::class, 'delete']);
    });
    Route::prefix('peb/vendor')->group(function () {
        Route::get('/', [VendorController::class, 'index']);
        Route::post('add-vendor', [VendorController::class, 'add']);
        Route::put('edit/{id_v}', [VendorController::class, 'put']);
        Route::delete('delete/{id_v}', [VendorController::class, 'delete']);
    });
});
Route::middleware('Role:admin')->group(function () {
    Route::prefix('data-bank')->group(function () {
        Route::get('/', [BankController::class, 'index']);
        Route::post('/', [BankController::class, 'post']);
        Route::put('edit/{id_bank}', [BankController::class, 'put']);
        Route::delete('delete/{id_bank}', [BankController::class, 'delete']);
    });
    Route::get('data-karyawan', [KaryawanController::class, 'index']);
    Route::prefix('periode')->group(function () {
        Route::get('/', [PeriodeController::class, 'index']);
        Route::post('/', [PeriodeController::class, 'post']);
        Route::put('edit/{id_periode}', [PeriodeController::class, 'put']);
        Route::delete('delete/{id_periode}', [PeriodeController::class, 'delete']);
    });
    Route::prefix('payslip/salary')->group(function () {
        Route::get('/', [SalaryKController::class, 'form_sort']);
        Route::post('/', [SalaryKController::class, 'show']);
        Route::put('edit/{id_salary_k}', [SalaryKController::class, 'put']);
        Route::put('publish/{id_salary_k}', [SalaryKController::class, 'publish']);
        Route::get('print/{id_salary_k}', [SalaryKController::class, 'print']);
        Route::delete('delete/{id_salary_k}', [SalaryKController::class, 'delete']);
    });

    Route::prefix('peb/vendor')->group(function () {
        Route::prefix('payment-date')->group(function () {
            Route::get('/', [PaymentDateController::class, 'index']);
            Route::post('/', [PaymentDateController::class, 'post']);
            Route::get('{payment_date}', [PaymentDateController::class, 'export']);
            Route::put('{id_payment_date}', [PaymentDateController::class, 'put']);
            Route::delete('{id_payment_date}', [PaymentDateController::class, 'delete']);
        });
        Route::prefix('data-transaksi')->group(function () {
            Route::get('/', [PaymentVendorController::class, 'index']);
            Route::post('/', [PaymentVendorController::class, 'postTransaksi']);
            Route::get('{id_payment_v}', [PaymentVendorController::class, 'export']);
            Route::put('{id_payment_v}', [PaymentVendorController::class, 'putTransaksi']);
            Route::delete('{id_payment_v}', [PaymentVendorController::class, 'delete']);
        });
    });
});
//     Route::middleware('Role:user')->group(function () {

// });
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'post'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
