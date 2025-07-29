<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\AssetController;

Route::get('/', [HomeController::class, 'HomePage'])->name('home');
Route::get('/about', [HomeController::class, 'AboutPage'])->name('about');
Route::get('/collection', [HomeController::class, 'CollectionPage'])->name('collection');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('contact');
Route::post('/contact', [MessagesController::class, 'store'])->name('messages.store');
Route::get('/blog', [HomeController::class, 'BlogPage'])->name('blog');
Route::get('/status', [StatusController::class, 'StatusPage'])->name('status')->middleware('web');



Route::middleware('auth','status')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth','admin', 'status')->group(function (){
    Route::get('admin/Dashboard', [DashboardController::class, 'Dashboard'])->name('admin_dashboard');
    Route::resource('admin/messages', MessagesController::class)->except('create', 'store');
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/blog', BlogController::class);
    Route::resource('admin/collection', CollectionController::class);
    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/stock', StockController::class);
    Route::resource('admin/assets', AssetController::class);
});

require __DIR__.'/auth.php';
