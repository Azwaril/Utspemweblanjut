<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //

    public function listUsers()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users', compact('users'));
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();

        return redirect()->back()->with('success', 'User sekarang jadi admin.');
    }
}
