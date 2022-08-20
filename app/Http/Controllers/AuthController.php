<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $result = Auth::id();
            return response()->json(['result'=>true,'res'=>$result]);
        }else{
            return response()->json(['result'=>false]);
        }
    }
}
