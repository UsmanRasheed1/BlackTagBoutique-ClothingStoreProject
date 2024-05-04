<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\VerificationMail;
use App\Models\user;

class mailcontroller extends Controller
{
    public function forgotpasswordform(){
        return view('displayforgotpasswordform');
    }
    public function generatecode(request $request){
        $email = $request->input('email');
        $checkemail = user::where('Email',$email)->first();
        if($checkemail == null){
            $error = 'Email Does not Exist, Try Again';
            return view('displayforgotpasswordform',['error' => $error]);
        }
        $code = random_int(10000, 99999);
        Mail::to($request->input('email'))->send(new VerificationMail($code));
        return view('verificationform',['email' => $email,'code' => $code]);
    }

    public function verifycode(request $request){
        $usercode = $request->input('usercode');
        $code = $request->input('code');
        $email = $request->input('email');
        if($usercode == $code){
            return view('resetpassword',['email' => $email]);
        }
        $error = 'Incorrect Code, Try Again!';
        return view('verificationform',['email' => $email,'code' => $code, 'error' => $error]);
    }

    public function resetpassword(request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        user::where('Email', $email)->update(['password' => $password]);
        $success = 'Password changed successfully!';
        return redirect()->route('login')->with('success', $success);
    }
   
}
