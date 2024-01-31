<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryContoller;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//เมนู User
Route::get('admin/user/index',[UserController::class,'index'])->name('u.index');

//เมนู Category
Route::get('admin/category/index',[CategoryContoller::class,'index'])->name('c.index');
Route::get('addmin/category/create',[CategoryContoller::class, 'create'])->name('c.create');
Route::post('admin/category/insert',[CategoryContoller::class, 'insert']);
Route::get('admin/category/edit/{id}',[CategoryContoller::class, 'edit']);
Route::post('admin/category/update/{id}',[CategoryContoller::class,'update']);
Route::get('admin/category/delete/{id}',[CategoryContoller::class, 'delete']);

//เมนู Product
Route::get('admin/Product/index',[ProductController::class,'index'])->name('p.index');
Route::get('admin/Product/create',[ProductController::class,'create'])->name('p.create');
Route::post('admin/Product/insert',[ProductController::class,'insert'])->name('insert');
Route::get('admin/Product/edit/{id}',[ProductController::class,'edit'])->name('edit');
Route::post('admin/Product/update/{id}',[ProductController::class,'update'])->name('update');
Route::get('admin/Product/delete/{id}',[ProductController::class,'delete'])->name('delete');
