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
Route::get('/backend/category/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'show'])->name('backend.category.show');

