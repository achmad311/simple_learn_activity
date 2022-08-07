<?php

use App\Http\Controllers\LearnActivityController;
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

// Route::get('/learn-activity', [LearnActivityController::class, 'index'])->name('learn-activity.index');

Route::resource('learn-activity', LearnActivityController::class);
Route::any('learn-activity/get-data', [LearnActivityController::class, 'getData'])->name('learn-activity.get-data');
