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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $data = App\Models\Task::all();

    return view('tasks')->with('tasks',$data);
});



Route::post('/save-task', 'App\Http\Controllers\TaskController@store');

Route::get('/toggleCompleted/{id}', 'App\Http\Controllers\TaskController@toggleCompleted');

Route::get('/deleteTask/{id}', 'App\Http\Controllers\TaskController@deleteTask');

Route::get('/update-task/{id}', 'App\Http\Controllers\TaskController@updateTask');

Route::post('/task-update', 'App\Http\Controllers\TaskController@taskUpdate');