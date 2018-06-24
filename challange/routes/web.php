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


Route::get('/locations', 'RestaurantController@restaurantLocations');
Route::get('/employees/{id}/{dailyOvertimeMultiplier}/{dailyOvertimeThreshold}/{overtime}/{weeklyOvertimeMultiplier}/{weeklyOvertimeThreshold}', 'RestaurantController@restaurantEmployees');
Route::get('/timepunches/{location}/{user}/{firstName}/{lastName}', 'RestaurantController@Timepunches');

