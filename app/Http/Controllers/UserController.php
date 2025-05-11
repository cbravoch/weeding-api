<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function validateUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ], 401);
        }

        return response()->json([
            'message' => 'User found',
            'status' => 'success'
        ], 200);
    }
}
