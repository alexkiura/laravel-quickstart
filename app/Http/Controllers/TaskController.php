<?php

namespace App\Http\Controllers;

use Validator;
use App\Task;
use Illuminate\Http\Request;
use Mail;

class TaskController extends Controller
{
    protected $request;

    public function listTasks(Request $request)
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', ['tasks' => $tasks]);
    }

    public function createTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255,'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        Mail::raw('this is an email', function($message) {
            $message->from('onboarding@andela.com', 'Test Success');
            $message->to('alex.kiura@andela.com')->subject('Test email');
        });
        return redirect('/');
    }
}