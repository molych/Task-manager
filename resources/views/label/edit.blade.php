@extends('layouts.app')
@section('content')
<h1 class="mb-5">{{__('label.add_new_label')}}</h1>

{{Form::model($label, ['route' => ['labels.update', $label], 'method' => 'PATCH'])}}
    <div class="form-group">
    {{Form::label('name', __('label.label_name'))}}
    {{Form::text('name', $label->name, ['class' => 'form-control'])}}

    {{Form::label('description', __('label.label_description'))}}
    {{Form::textarea('description', $label->description, ['class' => 'form-control', 'cols' => '50', 'rows' => '10'])}}

    {{Form::submit(__('label.create'), ['class' => 'btn btn-primary'])}}
    </div>
{{Form::close()}}

@endsection