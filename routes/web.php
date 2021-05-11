<?php

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

Route::get('', function () {
    return view('Auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





////////////////////// start admin page //////////////////////////
Route::group(['prefix' => LaravelLocalization::setLocale(),	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){


    ################ strat posts ###################

    Route::GET('dashboard','Admin\DashboardController@dashboard')->name('dashboard');
    Route::GET('index','Admin\PostController@index')->name('index');
    Route::GET('create_post','Admin\PostController@create_post')->name('create_post');
    Route::POST('create_post_store','Admin\PostController@create_post_store')->name('create_post_store');
    Route::GET('update_post/{id}','Admin\PostController@update_post')->name('update_post');
    Route::POST('update_post_store/{id}','Admin\PostController@update_post_store')->name('update_post_store');
    Route::GET('delete_post/{id}','Admin\PostController@delete_post')->name('delete_post');
    Route::GET('show_post/{id}','Admin\PostController@show_post')->name('show_post');
    Route::GET('complaints','Admin\ComplaintsController@complaints')->name('complaints');
    Route::GET('complaints_delete/{id}','Admin\ComplaintsController@complaints_delete')->name('complaints_delete');
   
   ############# Comment
   Route::GET('comment','Admin\CommentController@comment')->name('comment');
   Route::GET('comment_delete/{id}','Admin\CommentController@comment_delete')->name('comment_delete');
 
    ################ strat posts ###################

    ################ strat category ###################

    Route::GET('index_category','Admin\CategoryController@index_category')->name('index_category');
    Route::GET('create_category','Admin\CategoryController@create_category')->name('create_category');
    Route::POST('create_category_sotre','Admin\CategoryController@create_category_sotre')->name('create_category_sotre');
    Route::GET('update_category/{id}','Admin\CategoryController@update_category')->name('update_category');
    Route::POST('update_category_store/{id}','Admin\CategoryController@update_category_store')->name('update_category_store');
    Route::GET('delete_category/{id}','Admin\CategoryController@delete_category')->name('delete_category');

    ################ end category ###################

    ################ start user ###################

    Route::GET('index_user','Admin\UserController@index_user')->name('index_user');
    Route::GET('create_user','Admin\UserController@create_user')->name('create_user');
    Route::POST('create_user_store','Admin\UserController@create_user_store')->name('create_user_store');
    Route::GET('update_user/{id}','Admin\UserController@update_user')->name('update_user');
    Route::POST('update_user_store/{id}','Admin\UserController@update_user_store')->name('update_user_store');
    Route::GET('delete_user/{id}','Admin\UserController@delete_user')->name('delete_user');

############profile
Route::GET('profile_user/{id}','Admin\ProfileController@profile_user')->name('profile_user');

    ################ end user ###################


 });

});
////////////////////// end admin page //////////////////////////

////////////////////// start user page //////////////////////////
Route::group(['prefix' => LaravelLocalization::setLocale(),	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
Route::group(['prefix'=>'user','middleware'=>['auth']],function(){
    Route::GET('index_post','user\PostController@index_post')->name('index_post');
    Route::GET('category_post/{id}','user\PostController@category_post')->name('category_post');
    Route::GET('show/{id}','user\PostController@show')->name('show');
    Route::POST('create_comment/{id}','user\PostController@create_comment')->name('create_comment');
    Route::GET('update_comment/{id}','user\PostController@update_comment')->name('update_comment');
    Route::POST('update_comment_store/{id}','user\PostController@update_comment_store')->name('update_comment_store');
    Route::GET('delete_comment/{id}','user\PostController@delete_comment')->name('delete_comment');
    Route::GET('contact','user\PostController@contact')->name('contact');
    Route::POST('contact_store','user\PostController@contact_store')->name('contact_store');
 });
});
////////////////////// end user page //////////////////////////

