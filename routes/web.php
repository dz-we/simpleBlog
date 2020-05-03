<?php

// Pages
Route::get('/about', "PagesController@about")->name('aboutPage');
Route::get('/contact', "PagesController@contact")->name('contactPage');
Route::post('/sendmail', "PagesController@sendMail");

// Posts
Route::get('/', 'PostsController@index')->name('indexPage');
Route::resource('posts', 'PostsController');

// Comments
Route::post('/comments/{slug}', 'CommentsController@store')->name('comments.store');

// Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
