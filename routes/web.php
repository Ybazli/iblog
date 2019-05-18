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

});
Route::prefix(blogPrefix())->group(function (){


    Route::prefix(adminPrefix())->group(function () {

        //tag links

        Route::get('tags', 'TagController@index')
            ->name('tags.index');
        Route::get('tags/create', 'TagController@create')
            ->name('tags.create');
        Route::post('tags/create', 'TagController@store')
            ->name('tags.store');
        Route::get('tags{tag}', 'TagController@show')
            ->name('tags.show');
        Route::get('tags/edit/{tag}', 'TagController@edit')
            ->name('tags.edit');
        Route::patch('tags/edit/{tag}', 'TagController@update')
            ->name('tags.update');
        Route::delete('tags/{tag}', 'TagController@delete')
            ->name('tags.delete');

        //search
        Route::get('blog' , 'SearchController@search')->name('search');
        //dashboard
        Route::get('/dashboard' , 'DashboardController@index');

        //posts links
        Route::get('/', 'PostController@index')->name('posts.index');
        Route::get('/{post}', 'PostController@show')->name('posts.show');

        Route::get('posts/create', 'PostController@create')->name('posts.create');
        Route::post('posts/create', 'PostController@store')->name('posts.store');
        Route::get('posts/edit/{post}', 'PostController@edit')->name('posts.edit');
        Route::post('posts/edit/{post}', 'PostController@update')->name('posts.update');
        Route::delete('posts/{post}', 'PostController@delete')->name('posts.delete');
        Route::post('posts/create/image-upload' , 'ImageController@store')->name('posts.image.upload');

        //category links
        Route::get('categories', 'CategoryController@index')
            ->name('categories.index');
        Route::get('categories/{category}', 'CategoryController@show')
            ->name('categories.show');
        Route::get('categories/create', 'CategoryController@create')
            ->name('categories.create');
        Route::post('categories/create', 'CategoryController@store')
            ->name('categories.store');
        Route::get('categories/edit/{category}', 'CategoryController@edit')
            ->name('categories.edit');
        Route::patch('categories/edit/{category}', 'CategoryController@update')
            ->name('categories.update');
        Route::delete('categories/{category}', 'CategoryController@delete')
            ->name('categories.delete');


    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('logout' , function(){
   auth()->logout();
   return redirect()->route('login');
});


