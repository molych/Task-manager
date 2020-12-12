@extends('layouts.app')
@section('content')
<h1 class="mb-5">Edit Task Status</h1>

{{Form::model($taskStatus, ['route' => ['task_statuses.update', $taskStatus], 'method' => 'PATCH'])}}
    <div class="form-group">
    {{Form::label('name', __('task_status.status_name'))}}
    {{Form::text('name', $taskStatus->name, ['class' => 'form-control'])}}
    {{Form::submit(__('task_status.update'), ['class' => 'btn btn-primary'])}}
    </div>
{{Form::close()}}
@endsection