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
Route::post('/listLifx', 'LightController@listLifxLights');
Route::post('/togglePowerAll', 'LightController@togglePowerAll');
Route::post('/breatheLifxLights', 'LightController@breatheLifxLights');
Route::post('/setLifxState', 'LightController@setLifxState');
Route::post('/togglePowerSingle', 'LightController@togglePowerSingle');
