<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BlogController;

use function Termwind\style;

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
//นักอ่าน
Route::get('/',[BlogController::class,'index']);
Route::get('/detail/{id}',[BlogController::class,'detail'])->name('detail');


//นักเขียน
Route::prefix('author')->group(function(){
    Route::get('/blog',[AdminController::class,'index'])->name('blog');
    Route::get('/about',[AdminController::class,'about'])->name('about');
    Route::get('/create',[AdminController::class,'create'])->name('create');
    Route::post('/insert',[AdminController::class,'insert'])->name('insert');
    Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete');
    Route::get('/change/{id}',[AdminController::class,'change'])->name('change');
    Route::get('/edit/{id}',[AdminController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[AdminController::class,'update'])->name('update');
});
Auth::routes();

Route::fallback(function () {
    return "<h1 style= font-size:100px ,text-align:center;>มึงมันมั่ว</h1> ";
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
