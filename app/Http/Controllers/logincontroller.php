<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class logincontroller extends Controller
{
    public function displayLogin()
{
    

    return view('loginview');
}

    public function login(request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
        $email = $request->input('email'); 
        $password = $request->input('password'); 
        $user = user::where('Email', $email)->first();
        if (!$user || $password != $user->password) {
            $request->merge(['error' => 'Invalid username or password.']);
            return $this->customerror($request);
        }
        $Name = $user->First_Name . ' ' . $user->Last_Name;
        return view('homepage', ['email' => $email, 'name' => $Name]);

    }
    public function customerror(request $request)
    {

    $error = $request->input('error'); // Your error message here
    if($error == null){
        $error = 'You need to login to go to this page!';
    }
    return redirect()->route('login')->with('error', $error);

    }   
}
