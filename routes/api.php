<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#### ########?############### jwt سهله لكن مش عندي نت ارضي  #############

Route::group(['namespace'=>'apis\admin'],function(){
    ################# Admin ################################
    //category
    route::get('index_category','CategoryController@index_category');
    route::post('create_category','CategoryController@create_category');
    route::post('update_category/{id}','CategoryController@update_category');
    route::delete('delete_category/{id}','CategoryController@delete_category');
    
    //comment
    route::get('index_comment','CommentController@index_comment');
    route::delete('delete_comment/{id}','CommentController@delete_comment');

    //complaints
    route::get('complaints_index','ComplaintsController@complaints_index');
    route::delete('delete_complaints/{id}','ComplaintsController@delete_complaints');

    //dashboard
    route::get('dashboard','DashboardController@dashboard');

    //Post
    route::get('index_post','PostController@index_post');
    route::get('show_post/{id}','PostController@show_post');
    route::post('create_post','PostController@create_post');
    route::post('update_post/{id}','PostController@update_post');
    route::delete('delete_post/{id}','PostController@delete_post');

    //user
    route::get('index_user','UserController@index_user');
    route::post('create_user','UserController@create_user');
    route::post('update_user/{id}','UserController@update_user');

    

    ################# Admin ################################

    
});
    ################# User ################################

    Route::group(['namespace'=>'Apis\User','middleware'=>'auth:api'],function(){
          route::post('create_comments/{id}','PostController@create_comments');
          route::post('update_comments/{id}','PostController@update_comments');
          route::get('complaints','PostController@complaints');
        });
        
    ################# User ################################