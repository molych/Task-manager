<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $lables = Label::all();
        return view('label.index', compact('lables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $label = new Label();
        return view('label.create', compact('label'));
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
            'name' => 'required|unique:labels',
            'description' => 'nullable'
            ]);
        $label = new Label();
        $label->fill($data)->save();
        flash(__('label.added'))->success();
        return redirect()->route('labels.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Label  $label
     * @return \Illuminate\View\View
     */
    public function edit(Label $label)
    {
        return view('label.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Label  $label
     * @return \Illuminate\View\View
     */
    public function update(Request $request, Label $label)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:task_statuses,name,' . $label->id,
            'description' => 'nullable',
        ]);
        $label->fill($data)->save();
        flash(__('label.updated'))->success();
        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $label = Label::find($id);
        if ($label) {
            $label->delete();
        }
        flash(__('label.delete'))->success();
        return redirect()->route('labels.index');
    }
}
