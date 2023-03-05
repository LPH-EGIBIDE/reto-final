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
});
