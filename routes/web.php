<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin vendors
    Route::get('/admin/manage-vendors', [AdminController::class, 'manageVendors'])->name('admin.vendor.manageVendors');
    Route::get('/admin/add-vendor', [AdminController::class, 'showAddVendorForm'])->name('admin.vendor.addVendorForm');
    Route::post('/admin/add-vendor', [AdminController::class, 'addVendor'])->name('admin.vendor.addVendor');
    Route::get('/admin/edit-vendor/{vendor}', [AdminController::class, 'editVendorForm'])->name('admin.vendor.editVendorForm');
    Route::put('/admin/edit-vendor/{vendor}', [AdminController::class, 'updateVendor'])->name('admin.vendor.updateVendor');
    Route::delete('/admin/delete-vendor/{vendor}', [AdminController::class, 'deleteVendor'])->name('admin.vendor.deleteVendor');

    // Admin products
    Route::get('/admin/manage-products', [AdminController::class, 'manageProducts'])->name('admin.products.manageProducts');
    Route::get('/admin/add-product', [AdminController::class, 'showAddProductForm'])->name('admin.addProductForm');
    Route::post('/admin/add-product', [AdminController::class, 'addProduct'])->name('admin.addProduct');
    Route::get('/admin/edit-product/{product}', [AdminController::class, 'editProductForm'])->name('admin.editProductForm');
    Route::put('/admin/edit-product/{product}', [AdminController::class, 'updateProduct'])->name('admin.updateProduct');
    Route::delete('/admin/delete-product/{product}', [AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');

    Route::get('/admin/manage-stock', [AdminController::class, 'manageStock'])->name('admin.stock.manageStock');
    Route::post('/admin/add-stock/{product}', [AdminController::class, 'addStock'])->name('admin.stock.addStock');
    Route::get('/admin/edit-stock/{product}', [AdminController::class, 'editStockForm'])->name('admin.stock.editStockForm');
    Route::put('/admin/update-stock/{product}', [AdminController::class, 'updateStock'])->name('admin.stock.updateStock');
    Route::delete('/admin/delete-stock/{product}', [AdminController::class, 'deleteStock'])->name('admin.stock.deleteStock');
});

//  Vendor
Route::middleware(['auth', RoleMiddleware::class . ':vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'dashboard'])->name('vendor.dashboard');

    //  vendor products
    Route::get('/vendor/manage-products', [VendorController::class, 'manageProducts'])->name('vendor.manageProducts');
    Route::get('/vendor/add-product', [VendorController::class, 'addProductForm'])->name('vendor.addProductForm');
    Route::post('/vendor/add-product', [VendorController::class, 'addProduct'])->name('vendor.addProduct');
    Route::get('/vendor/edit-product/{product}', [VendorController::class, 'editProductForm'])->name('vendor.editProductForm');
    Route::put('/vendor/edit-product/{product}', [VendorController::class, 'editProduct'])->name('vendor.editProduct');
    Route::delete('/vendor/delete-product/{product}', [VendorController::class, 'deleteProduct'])->name('vendor.deleteProduct');

    //  vendor stock

    Route::get('/vendor/manage-stock', [VendorController::class, 'manageStock'])->name('vendor.manageStock');
    Route::get('/vendor/manage-stock/{product}/edit', [VendorController::class, 'editStockForm'])->name('vendor.editStockForm');
    Route::put('/vendor/update-stock/{product}', [VendorController::class, 'updateStock'])->name('vendor.updateStock');

});

//  Customer
Route::middleware(['auth', RoleMiddleware::class . ':customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/customer/view-products', [CustomerController::class, 'viewProducts'])->name('customer.viewProducts');
    Route::get('/customer/add-to-cart/{product}', [CustomerController::class, 'addToCart'])->name('customer.addToCart');
    Route::get('/customer/view-cart', [CustomerController::class, 'viewCart'])->name('customer.viewCart');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
