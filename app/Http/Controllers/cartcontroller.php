<?php

namespace App\Http\Controllers;

use App\Models\checkout_details;
use App\Models\my_cart;
use App\Models\colors;
use App\Models\user;
use App\Models\receipts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\receiptscontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\checkoutcontroller;




class cartcontroller extends Controller
{
    public function addtocart(request $request){
        
        $email = $request->input('email');
        $Clothesid = $request->input('Clothesid');
        $color = $request->input('color');
        
       $checkemail = checkout_details::where('email',$email)->first();
       if($Clothesid !== null){
        $exists = my_cart::where('Clothesid',$request->input('Clothesid'))
        ->where('Color',$request->input('color'))
        ->where('Clothesize',$request->input('size'))
        ->where('email',$request->input('email'))->first();
            if($exists){
                my_cart::where('Orderid', $exists->Orderid)
            ->increment('Quantity', $request->input('quantity'));
            }
            else{
       $picture = colors::where('Clothesid', $Clothesid)->where('color', $color)->pluck('picture')->first();
       $data = [
        'email' => $request->input('email'),
        'Clothesid' => $request->input('Clothesid'),
        'Clothes_Name' => $request->input('clothes_name'),
        'Color' => $request->input('color'),
        'Clothesize' => $request->input('size'),
        'Quantity' => $request->input('quantity'),
        'Price' => $request->input('Price'),
        'Picture' => $picture

        // Add more columns and values as needed
    ];
    
        // Insert the data into the database
        
    my_cart::create($data);
}
}

    if (!$checkemail) {
        $request->merge(['error' => 'You need to enter checkout details before entering your cart!']); 
        $checkoutcontroller = new checkoutcontroller();
        return $checkoutcontroller->displaycheckout($request);
    }
    
    return view('/gotodisplaycart',['email' => $email]);
   // return $this->displaycart($request);
    
}

    public function displaycart(request $request){
        $email = $request->input('email');
        if($email == null){
            return redirect()->route('logincustomerror');
        }
        $message = $request->input('message');
        session()->put('message', $message); 
       $cartitems = my_cart::where('email',$email)->get();
       $user = user::where('Email', $email)->first();
       $Name = $user->First_Name . ' ' . $user->Last_Name;
       $checkout_details = checkout_details::where('email',$email)->first();
       if($checkout_details == null){
        $error = 'You need to enter checkout details before entering your cart!';
        return view('/checkoutdetails',['email' => $email, 'Name' => $Name, 'error' => $error]);
       }
       return view('/cart',['cartitems'=> $cartitems,'Name' => $Name,'email' => $email,'checkout_details' => $checkout_details,'message' => $message]);

    }
    public function cartdelete(Request $request){
        
        $email = $request->input('email');
        $OrderIds = $request->input('OrderIds');
        $orderIdsArray = explode(',', $OrderIds);
         my_cart::whereIn('Orderid',$orderIdsArray)->delete();
         $request->merge(['message' => 'Previous Cart Items Deleted!']);
         return $this->displaycart($request);
         
    }    
    public function purchasefunction(request $request){
        $email = $request->input('email');
        $user = user::where('Email', $email)->first();
        $Name = $user->First_Name . ' ' . $user->Last_Name;
        $checkout_query = checkout_details::where('email',$email)->first();
        $OrderIds = $request->input('OrderIds');
        $orderIdsArray = explode(',', $OrderIds);
        $items = my_cart::whereIn('Orderid', $orderIdsArray)->get();

        $TotalPrice = 0;
        $itemnum = 1;
        $receipttext = "";
        foreach ($items as $item) {
            $receipttext .= "Item $itemnum\n" . $item->Clothes_Name . " Color: " . $item->Color . " Clothes Size: " . $item->Clothesize . " Quantity x Price = " . $item->Quantity . " x " . 
                $item->Price . " = " . $item->Total_Price . "\n";
            $itemnum++;
            $TotalPrice += $item->Total_Price;
        }
        $receipttext .= "Delivering to $Name at Address: " . $checkout_query->Address . ", PhoneNumber: " . $checkout_query->phonenum . ", Comments: " . $checkout_query->Comments;
        receipts::create(['Email' => $email, 'ReceiptText' => $receipttext, 'TotalPrice' => $TotalPrice]);
        my_cart::whereIn('Orderid',$orderIdsArray)->delete();
        return view('/gotoorder',['email' => $email]);
    }
    public function update_quantity(request $request){
        $Orderid = $request->input('Orderid');
        $Quantity = $request->input('quantity');
        my_cart::where('Orderid',$Orderid)->update(['Quantity' => $Quantity]);
        $request->merge(['message' => 'Quantity updated!']);
         return $this->displaycart($request);

    }
    public function displayorder(request $request){
         $email = $request->input('email');
        $receipt = receipts::where('Email',$email)->orderBy('ReceiptID','desc')->first();
        $timestamp = strtotime($receipt->DeliveryDate);
            $formattedDeliveryDate = date('d-F-Y', $timestamp);
            $receipt->formattedDeliveryDate = $formattedDeliveryDate;  
        return view('/displayorder',['email' => $email,'receipt' => $receipt]);
    }
    public function cancelorder(request $request){
        $email = $request->input('email');
        $receipt = receipts::where('Email',$email)->orderBy('ReceiptID','desc')->first();
        $id = $receipt->ReceiptID;
        receipts::where('ReceiptID',$id)->delete();
        
        $request->merge(['message' => 'Your Order has been Cancelled!']);
         return $this->displaycart($request);


    }
}
