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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', function(){
    return view('index');
})->name('index');

Route::get('/backend/category/create', [\App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('backend.category.create');
Route::post('/backend/category', [\App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('backend.category.store');
Route::get('/backend/category', [\App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('backend.category.index');
Route::get('/backend/category/{id}/show', [\App\Http\Controllers\Backend\CategoryController::class, 'show'])->name('backend.category.show');
Route::delete('/backend/category/{id}',[\App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('backend.category.destroy');
Route::get('/backend/category/{id}/edit', [\App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('backend.category.edit');
Route::put('/backend/category/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('backend.category.update');

Route::get('/backend/tag/create', [\App\Http\Controllers\Backend\TagController::class, 'create'])->name('backend.tag.create');
Route::post('/backend/tag', [\App\Http\Controllers\Backend\TagController::class, 'store'])->name('backend.tag.store');
Route::get('/backend/tag', [\App\Http\Controllers\Backend\TagController::class, 'index'])->name('backend.tag.index');
Route::get('/backend/tag/{id}/show', [\App\Http\Controllers\Backend\TagController::class, 'show'])->name('backend.tag.show');
Route::delete('/backend/tag/{id}', [\App\Http\Controllers\Backend\TagController::class, 'destroy'])->name('backend.tag.destroy');
Route::get('/backend/tag/{id}/edit', [\App\Http\Controllers\Backend\TagController::class, 'edit'])->name('backend.tag.edit');
Route::put('/backend/tag/{id}', [\App\Http\Controllers\Backend\TagController::class, 'update'])->name('backend.tag.update');

