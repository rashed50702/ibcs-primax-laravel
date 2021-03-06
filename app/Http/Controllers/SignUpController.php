<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function signup(Request $request){
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'is_admin' => 0,
            'password' => Hash::make($request->password)
        ]);
    }
}
