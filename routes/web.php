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



Route::get('/productos', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/productos/{id}', [App\Http\Controllers\ProductController::class, 'showUser'])->name('product.show')->whereNumber('id');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//<editor-fold desc="Rutas archivos">
Route::get('/attachments/{id}', [App\Http\Controllers\AttachmentController::class, 'show'])->name('attachment.show')->whereNumber('id');
Route::get('/attachments/{id}/{width}/{height}', [App\Http\Controllers\AttachmentController::class, 'show'])->name('attachment.show.custom')->whereNumber('id')->whereNumber('width')->whereNumber('height');
//</editor-fold>

Route::middleware(['auth'])->group(function () {
    //<editor-fold desc="Rutas Carrito">
    Route::get('/carrito', [App\Http\Controllers\CartController::class, 'show'])->name('cart.show');
    Route::patch('/carrito', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/carrito', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/carrito/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/carrito/api', [App\Http\Controllers\CartController::class, 'api'])->name('cart.api');
    Route::post('/carrito/api/discounts', [App\Http\Controllers\CartController::class, 'addDiscount'])->name('cart.addDiscount');
    Route::delete('/carrito/api/discounts', [App\Http\Controllers\CartController::class, 'removeDiscount'])->name('cart.removeDiscount');
    Route::post('/carrito/finalizar', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    //</editor-fold>


    //<editor-fold desc="Rutas User">
    Route::get('/perfil', [App\Http\Controllers\HomeController::class, 'profile'])->name('user.index');
    //</editor-fold>

    //<editor-fold desc="Rutas Pedidos">
    Route::get('/pedidos', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::get('/pedidos/{id}', [App\Http\Controllers\OrderController::class, 'showUser'])->name('order.show')->whereNumber('id');
    //</editor-fold>
});

Route::middleware(['auth', 'can:is-admin'])->group(function () {
    //<editor-fold desc="Rutas Admin">
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.admin');
    Route::get('/attachments/upload', [App\Http\Controllers\AttachmentController::class, 'create'])->name('attachment.create');
    Route::post('/attachments', [App\Http\Controllers\AttachmentController::class, 'upload'])->name('attachment.upload');

    //<editor-fold desc="Rutas Productos">
    Route::get('/admin/producto/registrar', [App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/producto/registrar', [App\Http\Controllers\ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/producto/{id}/editar', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.product.edit')->whereNumber('id');
    Route::put('/admin/producto/{id}/editar', [App\Http\Controllers\ProductController::class, 'update'])->name('admin.product.update')->whereNumber('id');
    Route::get('/admin/producto/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('admin.product.show')->whereNumber('id');
    Route::delete('/admin/producto/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('admin.product.destroy')->whereNumber('id');
    Route::get('/admin/producto/lista', [App\Http\Controllers\ProductController::class, 'adminIndex'])->name('admin.product.adminIndex');
    Route::get('/admin/producto/filtrar', [App\Http\Controllers\ProductController::class, 'filter'])->name('admin.product.filter');
    //</editor-fold>

    //<editor-fold desc="Rutas Categorias">
    Route::get('/admin/categoria/registrar', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/categoria/registrar', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/categoria/{id}/editar', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit')->whereNumber('id');
    Route::put('/admin/categoria/{id}/editar', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.category.update')->whereNumber('id');
    Route::get('/admin/categoria/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('admin.category.show')->whereNumber('id');
    Route::delete('/admin/categoria/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.destroy')->whereNumber('id');
    Route::get('/admin/categoria/lista', [App\Http\Controllers\CategoryController::class, 'adminIndex'])->name('admin.category.adminIndex');
    Route::get('/admin/categoria/filtrar', [App\Http\Controllers\CategoryController::class, 'filter'])->name('admin.category.filter');

    //</editor-fold>

    //<editor-fold desc="Rutas Pedidos">
    Route::get('/admin/pedidos/lista', [App\Http\Controllers\OrderController::class, 'adminIndex'])->name('admin.order.adminIndex');
    Route::get('/admin/pedidos/filtrar', [App\Http\Controllers\OrderController::class, 'filter'])->name('admin.order.filter');
    Route::get('/admin/pedidos/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('admin.order.show')->whereNumber('id');
    //</editor-fold>

    //<editor-fold desc="Rutas Ver Usuarios">
    Route::get('/admin/usuarios/lista', [App\Http\Controllers\UserController::class, 'adminIndex'])->name('admin.users.adminIndex');
    Route::get('/admin/usuarios/filtrar', [App\Http\Controllers\UserController::class, 'filter'])->name('admin.users.filter');
    Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.users.show')->whereNumber('id');
    //</editor-fold>

    //<editor-fold desc="Rutas Codigos descuento">
    Route::get('/admin/descuento/registrar', [App\Http\Controllers\DiscountCodeController::class, 'create'])->name('admin.discount.create');
    Route::post('/admin/descuento/registrar', [App\Http\Controllers\DiscountCodeController::class, 'store'])->name('admin.discount.store');
    Route::get('/admin/descuento/{id}/editar', [App\Http\Controllers\DiscountCodeController::class, 'edit'])->name('admin.discount.edit')->whereNumber('id');
    Route::put('/admin/descuento/{id}/editar', [App\Http\Controllers\DiscountCodeController::class, 'update'])->name('admin.discount.update')->whereNumber('id');
    Route::get('/admin/descuento/{id}', [App\Http\Controllers\DiscountCodeController::class, 'show'])->name('admin.discount.show')->whereNumber('id');
    Route::delete('/admin/descuento/{id}', [App\Http\Controllers\DiscountCodeController::class, 'destroy'])->name('admin.discount.destroy')->whereNumber('id');
    Route::get('/admin/descuento/lista', [App\Http\Controllers\DiscountCodeController::class, 'adminIndex'])->name('admin.discount.adminIndex');
    Route::get('/admin/descuento/filtrar', [App\Http\Controllers\DiscountCodeController::class, 'filter'])->name('admin.discount.filter');
    //</editor-fold>

    //</editor-fold>
});
