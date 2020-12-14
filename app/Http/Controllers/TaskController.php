<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskStatus;
use App\Models\Label;
use phpDocumentor\Reflection\Types\Nullable;

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
        dd($request);
        $data = $this->validate($request, [
            'name' => 'required|unique:tasks',
            'description' => 'nullable',
            'status_id' => 'required',
            'assigned_to_id' => 'nullable',
            ]);
        $taskStatus = new Task();
        $taskStatus->fill($data)->save();
        flash(__('task.added'))->success();
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        //
    }
}
