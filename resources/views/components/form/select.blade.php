{{ Form::bsSelect('status_id', $statuses, $task->status_id ?? null, 
    [ class' => 'form-control' . ($errors->has('status_id') ? ' is-invalid' : ''), 
    'placeholder' => __('task.status')]) }}

{{ Form::bsSelect('label_id[]', $labels, $task->labels, 
    ['class' => 'form-control', 'multiple' => true, 'size' => '5']) }}

{{ Form::bsSelect('assigned_to_id', $assigners, $task->assigned_to_id ?? null, 
    ['class' => 'form-control', 'placeholder' => __('task.assignee')]) }}