@extends('layouts.app')

@section('content')
<h1 class="mb-5">{{__('task_status.task_status')}}</h1>

@auth
<a href="{{route('task_statuses.create')}}" class="btn btn-primary">{{__('task_status.add_new')}}</a>
@endauth

<table class="table mt-2">
    <thead>
        <tr>
            <th>{{__('task_status.id')}}</th>
            <th>{{__('task_status.name')}}</th>
            <th>{{__('task_status.created_at')}}</th>
            @auth
                <th>{{__('task_status.actions')}}</th>
            @endauth
        </tr>
    </thead>
    <tbody>
    @foreach($taskStatuses as $taskStatus)
        <tr>
            <td>{{$taskStatus->id}}</td>
            <td>{{$taskStatus->name}}</td>
            <td>{{$taskStatus->created_at}}</td>
            @auth
                <td>
                    <a class="text-danger" 
                        href="{{route('task_statuses.destroy', $taskStatus)}}"
                        data-method="delete"  
                        rel="nofollow"
                        data-confirm="{{__('task_status.delete_confirm')}}" 
                    >
                        Remove                        
                    </a>
                    <a href="{{route('task_statuses.edit', $taskStatus)}}">
                        Edit                        
                    </a>
                </td>
            @endauth
        </tr>
    @endforeach
    </tbody>
</table>
@endsection