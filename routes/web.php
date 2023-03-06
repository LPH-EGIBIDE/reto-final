<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/producto', function () {
    return view('products.show');
});

Route::get('/productos', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/productos/{id}', [App\Http\Controllers\ProductController::class, 'showUser'])->name('product.show')->whereNumber('id');
Route::get('/carrito', [App\Http\Controllers\HomeController::class, 'carrito'])->name('cart.show');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//<editor-fold desc="Rutas archivos">
Route::get('/attachments/{id}', [App\Http\Controllers\AttachmentController::class, 'show'])->name('attachment.show')->whereNumber('id');
Route::get('/attachments/{id}/{width}/{height}', [App\Http\Controllers\AttachmentController::class, 'show'])->name('attachment.show.custom')->whereNumber('id')->whereNumber('width')->whereNumber('height');
//</editor-fold>

Route::middleware(['auth', 'can:is-admin'])->group(function () {
    //<editor-fold desc="Rutas Admin">
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.admin');
    Route::get('/attachments/upload', [App\Http\Controllers\AttachmentController::class, 'create'])->name('attachment.create');
    Route::post('/attachments', [App\Http\Controllers\AttachmentController::class, 'upload'])->name('attachment.upload');

    //<editor-fold desc="Rutas Productos">
    Route::get('/admin/producto/registrar', [App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/producto/registrar', [App\Http\Controllers\ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/producto/{id}/editar', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/producto/{id}/editar', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/admin/producto/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('admin.product.show');
    Route::delete('/admin/producto/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('admin.product.destroy');
    //</editor-fold>

    //<editor-fold desc="Rutas Categorias">
    Route::get('/admin/categoria/registrar', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/categoria/registrar', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/categoria/{id}/editar', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/categoria/{id}/editar', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/admin/categoria/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('admin.category.show');
    Route::delete('/admin/categoria/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.destroy');
    //</editor-fold>

    //<editor-fold desc="Rutas Codigos descuento">
    Route::get('/admin/descuento/registrar', [App\Http\Controllers\DiscountCodeController::class, 'create'])->name('admin.discount.create');
    Route::post('/admin/descuento/registrar', [App\Http\Controllers\DiscountCodeController::class, 'store'])->name('admin.discount.store');
    Route::get('/admin/descuento/{id}/editar', [App\Http\Controllers\DiscountCodeController::class, 'edit'])->name('admin.discount.edit');
    Route::put('/admin/descuento/{id}/editar', [App\Http\Controllers\DiscountCodeController::class, 'update'])->name('admin.discount.update');
    Route::get('/admin/descuento/{id}', [App\Http\Controllers\DiscountCodeController::class, 'show'])->name('admin.discount.show');
    Route::delete('/admin/descuento/{id}', [App\Http\Controllers\DiscountCodeController::class, 'destroy'])->name('admin.discount.destroy');
    //</editor-fold>

    //</editor-fold>
});
