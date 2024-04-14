<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class registercontroller extends Controller
{
    public function showRegistrationForm()
    {
        return view('/registerpage');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:user,email'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[A-Z])(?=.*\d).+$/'], // Add password rules
        ]);
        
        $existingUser = user::where('Email', $request->email)->first();
        if ($existingUser) {
            return redirect()->route('registerpage')->with('error', 'Email already exists. Please use a different email.');
           //return view('/registerpage');
        }

        user::create([
            'Email' => $request->email,
            'First_Name' => $request->first_name,
            'Last_Name' => $request->last_name,
            'password' => ($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
        //return view('/loginview');
    }
}
