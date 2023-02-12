<?php

use App\Http\Controllers\PostApiController;
use App\Http\Controllers\StoryApiController;
use App\Http\Controllers\TagApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/posts', [PostApiController::class, 'index'])->name('api.posts.index');
Route::get('/posts/{post}', [PostApiController::class, 'show'])->name('api.posts.show');

Route::get('/stories', [StoryApiController::class, 'index'])->name('api.stories.index');
Route::get('/stories/{story}', [StoryApiController::class, 'show'])->name('api.stories.show');

Route::get('/tags', [TagApiController::class, 'index'])->name('api.tags.index');
Route::get('/tags/{tag}', [TagApiController::class, 'show'])->name('api.tags.show');
