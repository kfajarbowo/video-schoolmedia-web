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

Route::get('/', function () {
    return view('welcome');
})->name('frontend.landing');


Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function(){
    Route::get('home','Home@index')->name('admin.home');

    // Route::get('users','Users@index');
    // Route::get('users/create','Users@create');
    // Route::post('users','Users@store');
    // Route::get('users/{id}','Users@edit');
    // Route::post('users/{id}','Users@update');
    // Route::get('users/delete/{id}','Users@delete');

    Route::resource('users', 'Users')->except(['show' ,'delete']); //semua fungsi yg ada di user controller kecuali function show
    Route::resource('categories', 'Categories')->except(['show']);
    Route::resource('skills', 'Skills')->except(['show']);
    Route::resource('tags', 'Tags')->except(['show']);
    Route::resource('pages', 'Pages')->except(['show']);
    Route::resource('videos', 'Videos')->except(['show']);
    Route::post('comments', 'Videos@commentStore')->name('comment.store');
    Route::get('comments/{id}','Videos@commentDelete')->name('comment.delete');
    Route::post('comments/{id}','Videos@commentUpdate')->name('comment.update');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('tag/{id}', 'HomeController@tags')->name('front.tags');
Route::get('video/{id}', 'HomeController@video')->name('front.video');


Route::middleware('auth')->group(function (){
    Route::post('comments/{id}','HomeController@commentUpdate')->name('front.commentUpdate');
    Route::post('comments/{id}/create','HomeController@commentStore')->name('front.commentStore');
});




