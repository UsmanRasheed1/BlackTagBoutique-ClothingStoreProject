<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\receipts;
use App\Models\user;

class receiptscontroller extends Controller
{
    //
    public function displayreceipts(request $request){
        $email = $request->input('email');
        if($email == null){
            return redirect()->route('logincustomerror');
        }
        $user = user::where('Email', $email)->first();
        $Name = $user->First_Name . ' ' . $user->Last_Name;
        $receipts = receipts::where('Email', $email)->orderByDesc('ReceiptID')->get();  
        
        
            foreach($receipts as $receipt){
                $timestamp = strtotime($receipt->DeliveryDate);
            $formattedDeliveryDate = date('d-F-Y', $timestamp);
            $receipt->formattedDeliveryDate = $formattedDeliveryDate;  
                $receipt->formattedDeliveryDate;
            }
        return view('/receipts',['receipts' => $receipts,'Name' => $Name, 'email' => $email]);
    }
}
