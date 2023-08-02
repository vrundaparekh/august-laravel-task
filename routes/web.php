<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
//admin routes
Route::get('/admin', function () { return view('admin.login'); });
Route::get('/admin/login', function () { return view('admin.login'); })->name('login');
Route::post('/admin/login',[AdminController::class,'loginAttempt'])->name('login-attempt');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('logout');
Route::group(['middleware' => 'admin'], function () {
    Route::group(['prefix' => 'admin'], function($router){
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::get('/demo',[AdminController::class,'demo'])->name('admin.demo');
        Route::group([
            'prefix' => 'movie'
        ], function ($router) {
            Route::get('/', [MovieController::class, 'index'])->name('movie.index');
            Route::get('/create', [MovieController::class, 'createMovie'])->name('movie.create');
            // Route::get('/', [AdminController::class, 'index'])->name('movie.index');
            Route::post('/store', [MovieController::class, 'storeMovies'])->name('movie.store');
        });

        }
    );
});
//front routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/movie', [HomeController::class, 'index'])->name('home');
Route::get('/movie/{movie_name?}', [HomeController::class, 'getMovies'])->name('movie.name');
