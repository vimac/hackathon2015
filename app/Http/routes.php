<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


use App\Model\Activity;


Route::controller('common', CommonController::class);
Route::controller('location', LocationController::class);
Route::controller('user', UserController::class);
Route::controller('activity', ActivityController::class);
Route::controller('', IndexController::class); //默认的必须放在最后一行

