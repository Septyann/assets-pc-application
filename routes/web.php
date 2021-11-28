<?php

use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\HardwareController;
use App\Http\Controllers\PositionController;
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

Route::get('/', function () {
	return view('welcome');
});

Route::resource('positions', PositionController::class);

Route::resource('hardwares', HardwareController::class);

Route::resource('accessories', AccessoryController::class);
