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
Route::post('/task', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'name' =>'required|max:255',
    ]);

    if ($validator->fails() ) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    // Mail::send('emails.reminder', ['task' => 'this is an email'], function($message) {
    //     $message->from('test-user-success@andela.com', 'Test Success');
    //     $message->to('test-user-fellow@andela.com')->subject('Test email');
    // });


    return redirect('/');

});

/**
* Delete an existing task
*/
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});