<?php

use App\Http\Controllers\Admin\NotificationsController;

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
Route::middleware(['auth:sanctum', 'verified'])->prefix('admin/notifications')->group(function () {

    Route::get('/', [NotificationsController::class, 'index'])->name('admin.notification.index');
    Route::get('/create', [NotificationsController::class, 'create'])->name('admin.notification.create');
    Route::post('/store', [NotificationsController::class, 'store'])->name('admin.notification.store');
    Route::get('/edit/{id}', [NotificationsController::class, 'edit'])->name('admin.notification.edit');
    Route::post('/update/{id}', [NotificationsController::class, 'update'])->name('admin.notification.update');
    Route::get('/delete/{id}', [NotificationsController::class, 'destroy'])->name('admin.notification.destroy');
    Route::match(['get', 'post'], '/settings', [NotificationsController::class, 'settings'])->name('admin.notification.settings');
    Route::match(['get', 'post'], '/notifications_config', [NotificationsController::class, 'notifications_config'])->name('admin.notification.notifications_config');
    Route::match(['get', 'post'], '/edit_template/{config_id}', [NotificationsController::class, 'edit_template'])->name('admin.notification.edit_template');
    Route::match(['get', 'post'], '/edit_email_template/{config_id}', [NotificationsController::class, 'edit_email_template'])->name('admin.notification.edit_email_template');
    Route::match(['get', 'post'], '/edit_web_template/{config_id}', [NotificationsController::class, 'edit_web_template'])->name('admin.notification.edit_web_template');
    Route::match(['get', 'post'], '/edit_sms_template/{config_id}', [NotificationsController::class, 'edit_sms_template'])->name('admin.notification.edit_sms_template');

});
