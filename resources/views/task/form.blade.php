

{{Form::label('description', __('task.description'))}}
{{Form::textarea('description', $task->description, ['class' => 'form-control', 'cols' => '50', 'rows' => '10'])}}

{{ Form::label('assigned_to_id', __('task.assignee')) }}
{{ Form::select('assigned_to_id', $assigners, $task->assigned_to_id ?? null, ['class' => 'form-control', 'placeholder' => __('task.assignee')]) }}

{{ Form::label('status_id', __('task.status')) }}
{{ Form::select('status_id', $statuses, $task->status_id ?? null, ['class' => 'form-control' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => __('task.status')]) }}

{{ Form::label('label_id', __('task.label')) }}
{{ Form::select('label_id[]', $labels, $task->labels, ['class' => 'form-control', 'multiple' => true, 'size' => '5']) }}

