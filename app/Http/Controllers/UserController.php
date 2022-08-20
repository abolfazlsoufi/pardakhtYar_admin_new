<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        //
    }

    public function view()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        $user->assignRole($request->input('role'));
        return response()->json($user);
    }
}
