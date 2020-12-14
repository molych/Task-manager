@extends('layouts.app')
@section('content')
<h1 class="mb-5">{{__('task.task')}}</h1>
@auth
<div>
    <a href="{{route('tasks.create')}}" class="btn btn-primary ml-auto">
    {{__('task.add_new')}}
    </a>
</div>
@endauth
<div class="d-flex">
 
    
    <table class="table mt-2">
        <thead>
            <tr>
                <th>{{__('task.id')}}</th>
                <th>{{__('task.status')}}</th>
                <th>{{__('task.name')}}</th>
                <th>{{__('task.creator')}}</th>
                <th>{{__('task.assignee')}}</th>
                <th>{{__('task.created_at')}}</th>
                @auth
                <th>{{__('task.actions')}}</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            <tr>
            @foreach($tasks as $task)
                <td>{{$task->id}}</td>
                <td>{{$task->status}}</td>
                <td>
                    <a href="{{route('tasks.show', $task->id)}}">
                        {{{$task->name}}}
                    </a>
                </td>
                <td>{{$task->creator}}</td>
                <td>{{$task->assigner}}</td>
                <td>{{$task->created_at}}</td>
                @auth
                <td>
                    <a href="{{route('tasks.edit', $task->id)}}">
                        {{__('task.edit')}}
                    </a>
                </td>
                @endauth
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection