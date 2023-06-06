<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

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

Route::get('/', function() {
    return view('dashboard');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('like/{postid}', [LikeController::class, 'like'])->name('like');

Route::get('/post', [PostController::class, 'index'])->name('index');

//die wijst alle route toe naar controller met lijne code
Route::resource('posts', PostController::class);

Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact-us');

Route::post('/contact-us/send-message', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/about', function () {
    return view('about');
})->name('about');

require __DIR__.'/auth.php';
