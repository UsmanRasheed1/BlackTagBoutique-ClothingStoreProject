<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\user;
use App\Models\checkout_details;
use App\Http\Controllers\cartcontroller;

class checkoutcontroller extends Controller
{
    public function displaycheckout(request $request)
    {
        $email = $request->input('email');
       echo $error = $request->input('error');
        if($email != null){
    
            $user = user::where('Email', $email)->first();
            $Name = $user->First_Name . ' ' . $user->Last_Name;
        }
        else {
            return redirect()->route('logincustomerror');
        }
        return view('checkoutdetails',['email' => $email, 'Name' => $Name,'error' => $error]);
    }

    public function checkoutfunction(request $request){
        //echo $request;
        $validatedData = $request->validate([
            'phonenum' => ['required', 'regex:/(\+92|0)3\d{9}/'], // Phone number validation
            'Address' => ['required', 'string'], // Address validation
            'Comments' => ['nullable', 'string'], // Optional comments validation
        ]);
        $email = $request->input('email');
        $phonenum = $request->input('phonenum');
        $Address = $request->input('Address');
        $Comments = $request->input('Comments');

        $emailexists = checkout_details::where('email', $email)->exists();
        
        if ($emailexists == 1){
            checkout_details::where('email', $email)->update(['phonenum' => $phonenum,'Address' => $Address , 'Comments' => $Comments]);
        }
        else 
        {
            checkout_details::create([
                'email' => $email,
                'phonenum' => $phonenum,
                'Address' => $Address,
                'Comments' => $Comments,
            ]);
        }
        $cartController = new cartcontroller();
        return $cartController->displaycart($request);
    }
    
}
