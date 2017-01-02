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

Route::get('/', 'PagesController@indexPage');
Route::get('/lights', 'PagesController@lightController');
Route::get('/setCloudKey/{id}', 'HomeController@cloudKeyPage');
Route::post('/setCloudKey/{id}', 'UserController@setCloudKey')->name('users.setcloudkey');

Route::get('/updateAccount/{id}', 'HomeController@updateAccountPage');
Route::post('/updateAccount/{id}', 'UserController@updateAccount')->name('users.update');

Route::post('/listLifx', 'LightController@listLifxLights');
Route::post('/togglePowerAll', 'LightController@togglePowerAll');
Route::post('/breatheLifxLights', 'LightController@breatheLifxLights');
Route::post('/setLifxState', 'LightController@setLifxState');
Route::post('/togglePowerSingle/{id}', 'LightController@togglePowerSingle');
Route::post('/togglePowerGroup/{id}', 'LightController@togglePowerGroup');
Route::post('/setStateGroup/{id}', 'LightController@setStateGroup');
Route::post('/setStateSingle/{id}', 'LightController@setStateSingle');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/profile', 'HomeController@index');
