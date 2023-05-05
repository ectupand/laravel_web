<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function tasks_list(){
        $users = User::all();
        $tasks = Task::with('user')->get();

        return view(
            'tasks',
            ['tasks' => $tasks,
            'users' => $users]
        );
    }

    public function tasks_add(){
        $users = User::all();
        return view(
            'add_task',
            ['users' => $users]);
    }

    public function tasks_add_check(Request $request) {
        $valid = $request->validate([
            'taskName' => 'required|max:66'
        ]);
        $task = new Task();
        $task->taskName = $request->input('taskName');
        $task->description = $request->input('description');
        $task->status = 0;
        $userName = $request->input('user');
        $user = User::where('name', '=', $userName)->first();
        $task->user_id = $user->id;

        $task->save();
        return redirect()->route('tasks');
    }

    public function edit_task($id){
        $task = Task::find($id);
        $users = User::all();
        return view(
            'task_edit',
            ['task' => $task,
            'users' => $users]);
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $task->taskName = $request->input('taskName');
        $task->description = $request->input('description');

        $task->status = $request->has('status');


        $userName = $request->input('user');
        $user = User::where('name', '=', $userName)->first();
        $task->user_id = $user->id;
        $task->update();
        return redirect('tasks');
    }
}
