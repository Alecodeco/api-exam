<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\PlanetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], function () {
  Route::controller(AuthController::class)->group(function() {
    Route::post('signup', 'signup')->name('signup');
    Route::post('login', 'login')->name('login');
  });
});

Route::middleware(['auth:api'])->group(function () {

  Route::group(['prefix' => 'auth'], function () {
    Route::controller(AuthController::class)->group(function() {
      Route::get('logout', 'logout')->name('logout');
      Route::get('profile', 'profile')->name('profile');
    });
  });

  Route::group(['prefix' => 'people'], function() {
    Route::controller(PeopleController::class)->group(function() {
      Route::get('getById/{id}', 'getById')->name('getById');
      Route::get('all', 'all')->name('all');
    });
  });

  Route::group(['prefix' => 'planets'], function() {
    Route::controller(PlanetController::class)->group(function() {
      Route::get('getById/{id}', 'getById')->name('getById');
      Route::get('all', 'all')->name('all');
    });
  });

  Route::group(['prefix' => 'vehicles'], function() {
    Route::controller(VehicleController::class)->group(function() {
      Route::get('getById/{id}', 'getById')->name('getById');
      Route::get('all', 'all')->name('all');
    });
  });


});
