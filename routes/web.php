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
use App\Task;
use Illuminate\Http\Request;

/**
* Display all tasks
*/
Route::get('/', 'TaskController@listTasks');

/**
* Add a new task
*/
Route::post('/task', 'TaskController@createTask');

/**
* Delete an existing task
*/
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});