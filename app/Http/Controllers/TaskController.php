<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $request;

    public function listTasks(Request $request)
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', ['tasks' => $tasks]);
    }
}