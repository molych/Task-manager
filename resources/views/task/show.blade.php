
@extends('layouts.app')
@section('content')
<h1>
    {{__('task.task')}}: {{$task->name}}
    <a href="{{route('tasks.edit', $task)}}">&#9881;</a>
</h1>
<p>{{__('task.name')}}: {{$task->name}}</p>
<p>{{__('task.status')}}: {{$task->status->name}}</p>
<p>{{__('task.description')}}: {{$task->description ?? ''}}</p>
<p>{{__('task.assignee')}}: {{optional($task->assignee)->name  ?? ''}}</p>
<div>{{__('task.labels')}}:
<ul>

</ul>
</div>
@endsection
