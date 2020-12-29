@extends('layouts.app')
@section('content')
<h1 class="mb-5">{{__("task.add_new_task")}}</h1>

{{Form::model($task, ['route' => ['tasks.update', $task], 'method' => 'PATCH'])}}
    <div class="form-group col-md-6">
    {{Form::label('name', __('task.name'))}}
    {{Form::text('name', $task->name, ['class' => 'form-control'])}}
    
    @include('task.form')
    </div>

    {{Form::submit(__('task.create'), ['class' => 'btn btn-primary'])}}
  
{{Form::close()}}

@endsection