@extends('layouts.app')
@section('content')
<h1 class="mb-5">{{__('task_status.add_new_status_task')}}</h1>

{{Form::model($taskStatus, ['route' => 'task_statuses.store']) }}
    <div class="form-group">
    {{Form::label('name', __('task_status.status_name'))}}
    {{Form::text('name', $taskStatus->name, ['class' => 'form-control'])}}
    {{Form::submit(__('task_status.create'), ['class' => 'btn btn-primary'])}}
    </div>
{{Form::close()}}

@endsection