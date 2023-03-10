<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::get('/about', function () {
    return view('about');
});

Route::get('/posts',function(){
    return view('posts');
})->middleware('auth');

Route::get('/dashboard', function () {
    $posts = Post::all();
    
    return view('dashboard',[
        'posts'  =>$posts,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //add post
    Route::post('/add-post', [PostController::class, 'add'])->name('add-post');
    Route::get('/index', [PostController::class, 'index'])->name('index');
  

    //all post controller
    Route::get('/all-post',[TestController::class,'all_post'])->name('all-post');
    Route::get('/edit-post/{id}', [TestController::class, 'edit'])->name('edit-post');
    Route::post('/update-post/{id}', [TestController::class, 'update'])->name('update-post');
    Route::post('/delete-post/{id}', [TestController::class, 'delete'])->name('delete-post');
});

require __DIR__.'/auth.php';

