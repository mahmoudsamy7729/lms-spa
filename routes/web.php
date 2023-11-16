<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard;
use App\Livewire\Category;
use App\Livewire\Author;
use App\Livewire\Publisher;
use App\Livewire\Book;
use App\Livewire\Login;


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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/category', Category::class)->name('category');
    Route::get('/author', Author::class)->name('author');
    Route::get('/publisher', Publisher::class)->name('publisher');
    Route::get('/book', Book::class)->name('book');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', Login::class)->name('login');
});






