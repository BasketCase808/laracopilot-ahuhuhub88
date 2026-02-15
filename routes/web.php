<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MerchantController;
use App\Http\Controllers\Admin\StripeConnectController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\SettingsController;

Route::get('/', function () { return view('welcome'); });

// Admin Authentication
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Merchant Management
Route::get('/admin/merchants', [MerchantController::class, 'index'])->name('admin.merchants.index');
Route::get('/admin/merchants/create', [MerchantController::class, 'create'])->name('admin.merchants.create');
Route::post('/admin/merchants', [MerchantController::class, 'store'])->name('admin.merchants.store');
Route::get('/admin/merchants/{id}', [MerchantController::class, 'show'])->name('admin.merchants.show');
Route::get('/admin/merchants/{id}/edit', [MerchantController::class, 'edit'])->name('admin.merchants.edit');
Route::put('/admin/merchants/{id}', [MerchantController::class, 'update'])->name('admin.merchants.update');
Route::delete('/admin/merchants/{id}', [MerchantController::class, 'destroy'])->name('admin.merchants.destroy');

// Stripe Connect Management
Route::post('/admin/merchants/{id}/generate-keys', [StripeConnectController::class, 'generateKeys'])->name('admin.stripe.generate');
Route::post('/admin/merchants/{id}/revoke-keys', [StripeConnectController::class, 'revokeKeys'])->name('admin.stripe.revoke');
Route::get('/admin/merchants/{id}/verify-account', [StripeConnectController::class, 'verifyAccount'])->name('admin.stripe.verify');
Route::post('/admin/merchants/{id}/update-capabilities', [StripeConnectController::class, 'updateCapabilities'])->name('admin.stripe.capabilities');

// Transaction Monitoring
Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
Route::get('/admin/transactions/{id}', [TransactionController::class, 'show'])->name('admin.transactions.show');

// Platform Settings
Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
Route::put('/admin/settings', [SettingsController::class, 'update'])->name('admin.settings.update');