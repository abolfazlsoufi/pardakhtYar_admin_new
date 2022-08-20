<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function view()
    {
        $permission = Permission::all();
        return response()->json($permission);
    }

    public function create(Request $request)
    {
        $permission = Permission::create(['name'=>$request->input('permission')]);
        $permission->save();
        return response()->json($permission);
    }
}
