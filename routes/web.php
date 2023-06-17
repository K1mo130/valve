<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FaqController;



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

Route::get('/', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/update/birthday', [ProfileController::class, 'updateBirthday'])->name('update.birthday');
    Route::put('/update/avatar', [ProfileController::class, 'updateAvatar'])->name('update.avatar');
    Route::post('/update/about', [ProfileController::class, 'updateAbout'])->name('update.about');
});

Route::get('like/{postid}', [LikeController::class, 'like'])->name('like');

Route::get('/news', [PostController::class, 'index'])->name('index');

// Die wijst alle route toe naar controller met lijne code
Route::resource('posts', PostController::class);

Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact-us');

Route::post('/contact-us/send-message', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/about', [AboutController::class, 'index'])->name('about');


// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout')->middleware('guest');


//faq pages
Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');

Route::get('/faq/{question}/edit', [FaqController::class, 'edit'])->name('faq.edit');

Route::put('/faq/{question}', [FaqController::class, 'update'])->name('faq.update');

Route::delete('faq/{question}', [FaqController::class, 'destroy'])->name('faq.destroy');

Route::get('faq/categories/{id}/edit', [FaqController::class, 'editCategory'])->name('faq.categories.edit');

Route::put('faq/categories/{id}', [FaqController::class, 'updateCategory'])->name('faq.categories.update');

Route::delete('faq/categories/{category}', [FaqController::class, 'destroyCategory'])->name('faq.categories.destroy');




//library pages
Route::post('/library/store', [LibraryController::class, 'store'])->name('library.store');

Route::get('/library', [LibraryController::class, 'index'])->name('library.index');

Route::get('/library/{id}/confirm-delete', [LibraryController::class, 'confirmDelete'])->name('library.confirm-delete');

Route::delete('/library/{id}', [LibraryController::class, 'destroy'])->name('library.destroy');


require __DIR__.'/auth.php';
