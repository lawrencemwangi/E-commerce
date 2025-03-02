<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;


Route::get('/', [HomeController::class, 'HomePage'])->name('home');
Route::get('/about', [HomeController::class, 'AboutPage'])->name('about');
Route::get('/collection', [HomeController::class, 'CollectionPage'])->name('collection');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('contact');
Route::get('/blog', [HomeController::class, 'BlogPage'])->name('blog');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','admin')->group(function (){
    Route::get('/Dashboard', [DashboardController::class, 'Dashboard'])->name('admin_dashboard');
});


require __DIR__.'/auth.php';
