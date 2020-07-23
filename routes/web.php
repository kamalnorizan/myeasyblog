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

// DB::listen(function($event){
//     dump($event->sql);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', 'PostController')->middleware('auth');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/index','UserController@index')->name('user.index');

Route::group(['middleware' => ['auth','roleOrPermission:create role|create permission|show role|show permission']], function () {
    Route::get('/permission/index','PermissionController@index')->name('permission.index');
    Route::post('/permission/storerole','PermissionController@storerole')->name('permission.storerole');
    Route::post('/permission/storepermission','PermissionController@storepermission')->name('permission.storepermission');
    Route::get('/permission/assignPermissionToRole/{role}/{permission}', 'PermissionController@assignPermissionToRole')->name('permission.assignPermissionToRole');
    Route::get('/permission/revokeRolePermission/{role}/{permission}', 'PermissionController@revokeRolePermission')->name('permission.revokeRolePermission');
    Route::get('/permission/removePermission/{permission}','PermissionController@removePermission')->name('permission.removePermission');
    Route::get('/permission/removeRole/{role}','PermissionController@removeRole')->name('permission.removeRole');

});

Route::get('/user/assignroletouser/{user}/{role}','UserController@assignroletouser')->name('user.assignroletouser');
Route::get('/user/assignpermissiontouser/{user}/{permission}','UserController@assignpermissiontouser')->name('user.assignpermissiontouser');

