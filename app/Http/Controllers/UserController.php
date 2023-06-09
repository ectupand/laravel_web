<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function signup_check(Request $request){
        $valid = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required|gt:18'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->age = $request->input('age');
        $user->password = $request->input('password');

        $user->save();
        return redirect()->route('tasks');
    }

    public function edit(){
        $users = User::all();
        return view(
            'user_edit',
            ['users' => $users]);
    }

    public function edit_check(Request $request){
        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->age = $request->input('age');
        $user->update();
        return redirect('tasks');
    }
}
