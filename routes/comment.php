<?php

use App\Http\Controllers\Admin\CommentsController;

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

Route::middleware(['auth:sanctum', 'verified', 'permissions'])->prefix('admin/comments')->group(function () {

    Route::get('/', [CommentsController::class, 'admin_index'])->name('comments.admin.index');
    Route::get('/edit/{id}', [CommentsController::class, 'admin_edit'])->name('comments.admin.edit');
    Route::post('/update/{id}', [CommentsController::class, 'admin_update'])->name('comments.admin.update');
    Route::get('/trash/{id}', [CommentsController::class, 'admin_trash'])->name('comments.admin.trash');
    Route::get('/delete/{id}', [CommentsController::class, 'admin_destroy'])->name('comments.admin.destroy');

});

Route::prefix('admin/comments')->group(function () {
    Route::post('/store', [CommentsController::class, 'admin_store'])->name('comments.admin.store');
});
