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

//no ajax SPA
Route::get('/', [App\Http\Controllers\AjaxYateController::class, 'index'])->name('yate.index');

//ajax
Route::get('fetchdata', [App\Http\Controllers\AjaxYateController::class, 'fetchData'])->name('yate.fetchData');

//logging
Route::get('logs',[\Rap2hpoutre\LaravelLogViewer\LogViewerController::class,'index']);

Auth::routes(); //hay que ver la forma de eliminar rutas que nos sobran