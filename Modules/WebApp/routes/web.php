<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEBSITE
|--------------------------------------------------------------------------
*/
Route::view('/', 'webapp::pages.home')->name('website.pages.blogs');
Route::view('blog/{slug}', 'webapp::pages.blog.post')->name('website.pages.blogs.post');


