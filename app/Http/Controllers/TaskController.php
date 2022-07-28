<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request){
        $task = new Task;
        $this->validate($request, [
            'task'=>'required|max:100|min:5',
        ]);

        $task->task = $request->task;
        $task->save();

        /* $data = Task::all();
        return view('tasks')->with('tasks', $data); */
        //dd($data);
        return redirect()->back();
    }

    public function toggleCompleted($id){
        $task = Task::find($id);
        $task->isCompleted = !$task->isCompleted;
        $task->save();
        return redirect()->back();
    }

    public function deleteTask($id){
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }

    public function updateTask($id){
        $task = Task::find($id);
        return view('updateTask')->with('taskData', $task);
    }

    public function taskUpdate(Request $request){
        $id = $request->id;
        $newTask = $request->task;
        $task = Task::find($id);

        $task->task = $newTask;
        $task->save();

        $newData = Task::all();

        return view('tasks')->with('tasks', $newData);
        
    }
}
