<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function tasks_list(){
        $tasks = Task::all();
        $users = User::all();
        return view(
            'tasks',
            ['tasks' => $tasks,
            'users' => $users]
        );
    }
}
