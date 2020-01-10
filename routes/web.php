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

use App\Chapter;
use App\Manga;


// backend
Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

Route::get('/ajax/genres/search', 'MangaController@genreSearch');
Route::resource('manga', 'MangaController');

Route::get('manga/add-chapter/{id}', 'ChapterController@create')->name('chapters.add-chapter');
Route::get('manga/{id}/chapter', 'ChapterController@index')->name('chapters.list');
Route::resource('chapters', 'ChapterController');

Route::resource('genre', 'GenreController');


// frontend
Route::get('/', 'FrontController@index')->name('front.index');
Route::get('/title/{id}', 'FrontController@detailPage')->name('manga.detail');
Route::get('chapter/{id}', 'FrontController@readManga')->name('manga.read');
Route::get('daftar/', 'FrontController@listManga')->name('manga.list');
Route::get('search/keyword','FrontController@searchManga')->name('manga.search');

Auth::routes();
Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
   })->name("register");

Route::get('/home', 'MangaController@index')->name('home');
