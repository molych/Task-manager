<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskStatus;
use App\Models\Label;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::all();
        return view("task.index", compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $task = new Task();

        $assigners = User::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');
        $statuses = TaskStatus::pluck('name', 'id');

        return view('task.create', [
            'task' => $task,
            'labels' => $labels,
            'statuses' => $statuses,
            'assigners' => $assigners,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
  
        $data = $this->validate($request, [
            'name' => 'required|unique:tasks',
            'description' => 'nullable',
            'status_id' => 'required',
            'assigned_to_id' => 'nullable',
            ]);
        $task = new Task();
        $task->fill($data);
        $user = Auth::user();
        $task->createBy()->associate($user);
        $task->save();

        flash(__('task.added'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function show(Task  $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *  @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function edit(Task  $task)
    {
        $assigners = User::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');
        $statuses = TaskStatus::pluck('name', 'id');

        return view('task.edit', [
            'task' => $task,
            'labels' => $labels,
            'statuses' => $statuses,
            'assigners' => $assigners,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function update(Request $request, Task  $task)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status_id' => 'nullable',
            'assigned_to_id' => 'nullable',
        ]);

        $task->fill($data);
        $task->save();

        flash(__('task.updated'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function destroy($task)
    {
        $task->delete();

        flash(__('task.removed'))->success();

        return redirect()->route('tasks.index');
    }
}
