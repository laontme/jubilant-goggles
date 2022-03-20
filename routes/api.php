<?php

use App\Http\Controllers\TodoItemController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')
    ->group(function () {
    Route::prefix('/user')
        ->controller(UserController::class)
        ->group(function () {
            Route::get('/', 'show');
        });

    Route::prefix('/todo')
        ->group(function () {
            Route::prefix('/list')
                ->controller(TodoListController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/', 'store')->name('store');
                    Route::get('/{todoList}', 'show')->name('show');
                    Route::patch('/{todoList}', 'update')->name('update');
                    Route::delete('/{todoList}', 'destroy')->name('destroy');
                });

            Route::prefix('/item')
                ->controller(TodoItemController::class)
                ->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::post('/', 'store')->name('store');
                    Route::get('/{todoItem}', 'show')->name('show');
                    Route::patch('/{todoItem}', 'update')->name('update');
                    Route::delete('/{todoItem}', 'destroy')->name('destroy');
            });
        });
});
