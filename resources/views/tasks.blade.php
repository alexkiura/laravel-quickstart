@extends('layouts.app')

@section('content')

    <div class="panel-body">
        @include('common.errors')

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
    </div>

@endsection