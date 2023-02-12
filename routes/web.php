<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

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
Route::resource('/posts', PostController::class)->middleware('auth');

// Route::group(['middleware' => ['permission:write posts']], function () {
//     Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');    
// });
// Route::group(['middleware' => ['permission:edit posts']], function () {    
//     Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// });

/* Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id?}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
}); */

Route::resource('/admin/users', UserController::class)->middleware('auth');

Route::resource('/stories', StoryController::class)->middleware('auth');
Route::resource('/tags', TagController::class)->middleware('auth');

// Route::get('/contacts', function(){
//     Mail::to('test@email.com')->send(new TestMail());
// });
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
