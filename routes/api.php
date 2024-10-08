<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Frontend\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('comments_data',[CommentController::class,'getComments']);
Route::post('comments_data/delete/{id}',[CommentController::class,'commentDelete']);
Route::get('categories_data',[\App\Http\Controllers\Backend\CategoryController::class,'categoriesGetData']);
Route::put('categories_data',[\App\Http\Controllers\Backend\CategoryController::class,'categoriesUpdateData']);
Route::post('categories_data',[\App\Http\Controllers\Backend\CategoryController::class,'categoriesStoreData']);
Route::post('categories_data/{id}',[\App\Http\Controllers\Backend\CategoryController::class,'catDelete']);