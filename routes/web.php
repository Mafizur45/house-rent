<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseRentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;

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

Route::get('/', [HouseRentController::class, 'rent'])->name('house.rent');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// HouseRentController
Route::get('/house/rent', [HouseRentController::class, 'rent'])->name('house.rent');
Route::get('/houses/create', [HouseRentController::class, 'create'])->name('house.create');
Route::post('/houses', [HouseRentController::class, 'store'])->name('house.store');
Route::get('/houses/{id}', [HouseRentController::class, 'show'])->name('house.view');


Route::post('/house/{id}/comment', [CommentController::class, 'store'])->name('comment.store');



Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('profile/home', [ProfileController::class, 'home'])->name('profile.home');


Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/comment', [PostController::class, 'comment'])->name('posts.comment');
});

