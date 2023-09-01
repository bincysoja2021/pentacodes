<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add', [App\Http\Controllers\Blogcontroller::class, 'add'])->name('add');
Route::post('/store', [App\Http\Controllers\Blogcontroller::class, 'store'])->name('store');
Route::get('/edit/{id}', [App\Http\Controllers\Blogcontroller::class, 'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Blogcontroller::class, 'update'])->name('update');
Route::get('/read_more/{id}', [App\Http\Controllers\Blogcontroller::class, 'read_more'])->name('read_more');
Route::delete('/blog_destroy/{id}', [App\Http\Controllers\Blogcontroller::class, 'blog_destroy'])->name('blog_destroy');
