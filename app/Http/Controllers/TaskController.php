<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        $tasks = Task::orderBy('id')->paginate(5);
        return view('admin.tasks.index',compact('tasks','users'));
    }
    public function internIndex(){
        $tasks = Task::latest()->paginate(5);
        return view('intern.tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('admin.tasks.create', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);
        $data = $request->except('_token');

        Task::create($data);

        return redirect()->route('admin.tasks.index')->withMessage('Task has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $users = User::where('id', '!=', auth()->user()->id)->get();

       return view('admin.tasks.edit', compact('task','users'));
    }

    public function internEdit(string $id){
        $task = Task::findOrFail($id);

        return view ('intern.tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);
        $data = $request->all();
        $task->update($data);

        return redirect()->route('admin.tasks.index' )->withMessage('Task has been Updated');
    }

    public function internUpdate(Request $request, Task $task){

        $request->validate([
            'name' => 'required',
            'status'=>'required'
        ]);
        $data = $request->all();
        $task->update($data);

        return redirect()->route('intern.tasks.index' )->withMessage('Task has been Updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks.index' )->withMessage('Task has been Deleted');
    }
}
