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
        @foreach($tasks as $task)
            <tr>
         
                <td>{{$task->id}}</td>
                <td>{{$task->status->name}}</td>
                <td>
                    <a href="{{route('tasks.show', $task->id)}}">
                        {{{$task->name}}}
                    </a>
                </td>
                <td>{{$task->createBy->name}}</td>
                <td>{{optional($task->assignee)->name}}</td>
                <td>{{$task->created_at}}</td>
                @auth
                <td>
                    @can('delete', $task)
                    <a href="{{ route('tasks.destroy', $task) }}" data-confirm="{{__('task.delete_confirm')}}" data-method="delete" rel="nofollow">{{__('task.delete')}}</a>
                    @endcan
                    <a href="{{route('tasks.edit', $task->id)}}">
                        {{__('task.edit')}}
                    </a>
                </td>
                @endauth
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection