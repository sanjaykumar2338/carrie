<?php

use App\Http\Controllers\Admin\ToolsController;
use App\Http\Controllers\Admin\ThemesController;
use App\Http\Controllers\Admin\MagicEditorsController;
use Illuminate\Http\Request;

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

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin/tools')->group(function () {

    Route::match(['get', 'post'], '/export', [ToolsController::class, 'export'])->name('tools.admin.export');
    Route::match(['get', 'post'], '/import', [ToolsController::class, 'import'])->name('tools.admin.import');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin/themes')->group(function () {
    Route::match(['get', 'post'], '/index', [ThemesController::class, 'index'])->name('themes.admin.index');
    Route::match(['get', 'post'], '/admin_themes', [ThemesController::class, 'admin_themes'])->name('themes.admin.admin_themes');
    Route::match(['post'], '/import_theme', [ThemesController::class, 'import_theme'])->name('themes.admin.import_theme');
    Route::match(['get', 'post'], '/add_theme', [ThemesController::class, 'add_theme'])->name('themes.admin.add_theme');
    Route::match(['get', 'post'], '/add_admin_theme', [ThemesController::class, 'add_admin_theme'])->name('themes.admin.add_admin_theme');
    Route::match(['get', 'post'], '/install_theme', [ThemesController::class, 'install_theme'])->name('themes.admin.install_theme');
    Route::match(['get', 'post'], '/install_upload_theme', [ThemesController::class, 'install_upload_theme'])->name('themes.admin.install_upload_theme');
    Route::match(['get', 'post'], '/delete', [ThemesController::class, 'delete'])->name('themes.admin.delete');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin/magic_editors')->group(function () {
    Route::match(['get'], '/use_me', [MagicEditorsController::class, 'admin_use_me'])->name('admin.use.me');
    Route::match(['get', 'post'], '/edit_section', [MagicEditorsController::class, 'admin_edit_section'])->name('admin.edit.me');
    Route::match(['get', 'post'], '/update_element', [MagicEditorsController::class, 'admin_update_element'])->name('update.element.me');
    Route::match(['get', 'post'], '/remove_image', [MagicEditorsController::class, 'admin_remove_image'])->name('me.admin.remove_image');
    Route::match(['get', 'post'], '/page_content/{page_id}', [MagicEditorsController::class, 'get_page_content'])->name('get.page_content.me');
    Route::get('/get_all_cpt', [MagicEditorsController::class, 'get_all_cpt'])->name('admin.get_all_cpt.me');
    Route::get('/get_post_by_cpt/{post_type}', [MagicEditorsController::class, 'get_post_by_cpt'])->name('admin.get_post_by_cpt.me');
    Route::get('/get_post_taxonomy/{taxonomy}', [MagicEditorsController::class, 'get_post_taxonomy'])->name('admin.get_post_taxonomy.me');

    /*  editor elements ajax routes  */
    Route::post('/get_post_by_category', [MagicEditorsController::class, 'get_post_by_category'])->name('admin.get_post_by_category.me');
    Route::post('/get_cpt_categories', [MagicEditorsController::class, 'get_cpt_categories'])->name('admin.get_cpt_categories.me');
    Route::post('/get_post_by_cpt_category', [MagicEditorsController::class, 'get_post_by_cpt_category'])->name('admin.get_post_by_cpt_category.me');
    Route::match(['get', 'post'],'/ajax_load_more', [MagicEditorsController::class, 'ajax_load_more'])->name('admin.ajax_load_more.me');
});

/* ============================== Use this route for themes preview images ============================== */
Route::get('/themes/{vendor}/{theme}/{file}', function($vendor, $theme, $file){
    $path = base_path() . '/themes/' . $vendor.'/'.$theme.'/'.$file;

    if(File::exists($path)) {
        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    return false;
})->name('get_file');
/* ============================== Use this route for themes preview images ============================== */