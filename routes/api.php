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

Route::group(['middleware' => ['auth:api','scopes:create-post,show-post']], function () {
    Route::get('/post/allpost', 'ApiController@allpost')->middleware('scope:edit-post');
    Route::post('/post/createPost', 'ApiController@createPost');
    Route::get('logout','ApiController@logout');
    Route::get('logoutall','ApiController@logoutall');
});

Route::post('login','ApiController@login');
Route::post('loginApps','ApiController@loginApps');


