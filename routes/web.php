<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
    return view('welcome');
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

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('permission:write posts');
// Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('permission:edit posts');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::group(['middleware' => ['permission:write posts']], function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');    
});
Route::group(['middleware' => ['permission:edit posts']], function () {    
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
});
