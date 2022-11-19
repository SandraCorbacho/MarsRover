<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoverController;

use Illuminate\Support\Facades\Session;
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
    Session::forget('obstacles');
    return view('welcome');
});

 
Route::post('/mart', [RoverController::class, 'initial']);

Route::post('/roverMove', [RoverController::class, 'move']);
