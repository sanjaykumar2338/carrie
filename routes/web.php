<?php

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


require __DIR__.'/acl.php';
require __DIR__.'/admin.php';
require __DIR__.'/fortify.php';
require __DIR__.'/blog.php';
require __DIR__.'/page.php';
require __DIR__.'/menu.php';
require __DIR__.'/tools.php';
require __DIR__.'/notification.php';
require __DIR__.'/configuration.php';
require __DIR__.'/comment.php';

Route::get('optimize-clear', function() {
	\Artisan::call('optimize:clear');
	echo 'success';
});
