<?php

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

// Páginas estáticas
Route::get('/', 'PagesController@index')->name('root');
Route::get('/contact', 'PagesController@contact')->name('contact')->middleware('auth');
Route::get('/about', 'PagesController@about')->name('about');

// Rutas para la entidad Books
Route::resource('/books', 'BooksController');
Route::get('/users/{user}/books', 'userBooksController@index')->name('user.index');

Route::resource('/publishers', 'PublisherController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
