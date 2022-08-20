<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function view()
    {
        $role = Role::all();
        return response()->json($role);
    }

    public function viewById($id)
    {
        $role = Role::findById($id);
        $role->permissions->count();
        return response()->json($role);
    }

    public function create(Request $request)
    {
        $role = Role::create(['name'=>$request->input('role')]);
        $role->save();
        return response()->json($role);
    }

    public function update(Request $request,$id)
    {
        $role = Role::findById($id);
        $role->givePermissionTo($request->input('view'));
        $role->givePermissionTo($request->input('create'));
        $role->givePermissionTo($request->input('update'));
        $role->givePermissionTo($request->input('delete'));
        $role->save();
        return response()->json($role);
    }
}
