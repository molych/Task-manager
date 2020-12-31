@extends('layouts.app')
@section('content')
<h1 class="mb-5">{{__("task.add_new_task")}}</h1>

{{Form::model($task, ['route' => 'tasks.store']) }}
    <div class="form-group col-md-6">
    {{ Form::bsText('name') }}
    {{ Form::bsTextArea('description') }}
    {{ Form::bsSelect('assigned_to_id') }}
    {{ Form::bsSeclect('status_id') }}
    {{ Form::bsSelect('label_id[]') }}   
    </div>

    {{Form::submit(__('task.create'), ['class' => 'btn btn-primary'])}}
  
{{Form::close()}}

@endsection