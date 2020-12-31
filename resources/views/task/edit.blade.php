@extends('layouts.app')
@section('content')
<h1 class="mb-5">{{__("task.add_new_task")}}</h1>

{{Form::model($task, ['route' => ['tasks.update', $task], 'method' => 'PATCH'])}}
    <div class="form-group col-md-6">
    {{ Form::bsText('name') }}

    {{ Form::bsTextArea('description', $task->description, ['cols' => '50', 'rows' => '10']) }}

    {{ Form::bsSelect('assigned_to_id', $assigners, $task->assigned_to_id ?? null, ['placeholder' => __('task.assignee')]) }}

    {{ Form::bsSelect('status_id', $statuses, $task->status_id ?? null, ['placeholder' => __('task.status')]) }}

    {{ Form::bsSelect('label_id[]', $labels, $task->labels, ['multiple' => true, 'size' => '5']) }} 
    </div>

    {{Form::submit(__('task.create'), ['class' => 'btn btn-primary'])}}
  
{{Form::close()}}

@endsection