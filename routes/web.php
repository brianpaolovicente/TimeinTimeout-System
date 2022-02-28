<?php

use Illuminate\Support\Facades\Route;


use App\Services;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;


Route::get('/', [PagesController::class, 'index']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/services', [PagesController::class, 'services']);

Route::resource('/posts', PostsController::class);

Route::post('/timeinout', [PagesController::class, 'timeinout']);
Route::get('/attendance', [PagesController::class, 'display']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('details',function(){

            
            
});
