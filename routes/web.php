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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/attachments/{id}', [App\Http\Controllers\AttachmentController::class, 'show'])->name('attachment.show')->whereNumber('id');
Route::get('/attachments/{id}/{width}/{height}', [App\Http\Controllers\AttachmentController::class, 'show'])->name('attachment.show.custom')->whereNumber('id')->whereNumber('width')->whereNumber('height');


Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.admin');
    Route::get('/attachments/upload', [App\Http\Controllers\AttachmentController::class, 'create'])->name('attachment.create');
    Route::post('/attachments', [App\Http\Controllers\AttachmentController::class, 'upload'])->name('attachment.upload');
    Route::get('/producto/registrar', [App\Http\Controllers\ProductController::class, 'create'])->name('admin.product.create');
    Route::get('/producto/editar', [App\Http\Controllers\ProductController::class, 'edit'])->name('admin.product.edit');
    Route::get('/producto/ver', [App\Http\Controllers\ProductController::class, 'show'])->name('admin.product.show');
    Route::get('categoria/registrar', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.category.create');
    Route::get('categoria/editar', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::get('categoria/ver', [App\Http\Controllers\CategoryController::class, 'show'])->name('admin.category.show');
});
