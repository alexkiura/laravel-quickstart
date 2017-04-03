@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <!-- Validation errors -->
        @include('common.errors')

        <!--New Task form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ crsf_field() }}
            
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label"></label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add task button -->
            <div class="form-group">
                <div class="col-sm-offset col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add task
                    </button>
                </div>
            </div>
        </form>

        <!-- Current tassks -->
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <!-- Table headings -->
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <!-- Table Body -->
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <!-- Task name -->
                                    <td class="table-text">
                                        <div>{{ $task->name}}</div>
                                    </td>
                                    <td>
                                        <!-- Delete button -->
                                        <form action="/task/{{ $task->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button>Delete Task</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    @endif

@endsection