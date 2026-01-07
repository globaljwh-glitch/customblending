<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ResourceController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/resources', [ResourceController::class, 'index'])->name('resource.index');
    Route::get('/resources/create', [ResourceController::class, 'create'])->name('resource.create');
    Route::post('/resources', [ResourceController::class, 'store'])->name('resource.store');
    Route::get('/resources/{id}/edit', [ResourceController::class, 'edit'])->name('resource.edit');
    Route::put('/resources/{id}', [ResourceController::class, 'update'])->name('resource.update');
    Route::delete('/resources/{id}', [ResourceController::class, 'destroy'])->name('resource.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/blogs', [AdminBlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blog.create');
    Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::get('/blogs/{id}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blogs/{id}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{id}', [AdminBlogController::class, 'destroy'])->name('blog.delete');
});

Route::prefix('api')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::post('/blogs', [BlogController::class, 'store']);
    Route::get('/blogs/{id}', [BlogController::class, 'show']);
    Route::put('/blogs/{id}', [BlogController::class, 'update']);
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);
});

Route::post('/api/contact', [ContactController::class, 'store']);

Route::get('/', function () {
    return view('app');
});

Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!login|dashboard|admin).*$');


require __DIR__.'/auth.php';
