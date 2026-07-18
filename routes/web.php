<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Seller\ProductController;
use App\Http\Controllers\Admin\CatalogApprovalController;

// Module 3 Imports
use App\Http\Controllers\Seller\SupplierController;
use App\Http\Controllers\Seller\PurchaseOrderController as SellerPOController;
use App\Http\Controllers\Supplier\RegistrationController;
use App\Http\Controllers\Supplier\DashboardController as SupplierDashboardController;
use App\Http\Controllers\Supplier\PurchaseOrderController as SupplierPOController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// SELLER-only routes (must be logged in AND have 'seller' role)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Seller/Dashboard');
        })->name('dashboard');
    });

// ADMIN-only routes (must be logged in AND have 'admin' role)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');
    });


// ==========================================
// MODULE 2: CATALOG MANAGEMENT
// ==========================================
// Seller Routes
Route::middleware(['auth', 'role:seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::resource('products', ProductController::class);

    // Module 3: Procurement
    Route::resource('suppliers', SupplierController::class);
    Route::resource('purchase-orders', SellerPOController::class);
});



// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/catalog/approvals', [CatalogApprovalController::class, 'index'])->name('catalog.approvals');
    Route::post('/catalog/{product}/approve', [CatalogApprovalController::class, 'approve'])->name('catalog.approve');
    Route::post('/catalog/{product}/reject', [CatalogApprovalController::class, 'reject'])->name('catalog.reject');
});


// Supplier Registration (Guest accessible with valid token)
Route::get('/supplier/register', [RegistrationController::class, 'create'])->name('supplier.register');
Route::post('/supplier/register', [RegistrationController::class, 'store']);

// Supplier Portal (Requires Login)
Route::middleware(['auth', 'verified'])->prefix('supplier')->name('supplier.')->group(function () {
    Route::get('/dashboard', [SupplierDashboardController::class, 'index'])->name('dashboard');
    Route::resource('purchase-orders', SupplierPOController::class)->only(['index', 'show', 'update']);
});

