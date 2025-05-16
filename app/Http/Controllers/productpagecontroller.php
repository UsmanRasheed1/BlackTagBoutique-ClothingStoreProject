<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clothes;
use App\Models\colors;
use App\Models\reviews;
use Illuminate\Support\Facades\Session;

class productpagecontroller extends Controller
{
    public function productmain(request $request){
        $Clothesid = $request->input('Clothesid');
        
        $email = $request->input('email');
       
        
        $clothes = clothes::where('Clothesid', $Clothesid)->first();
         $clothes_name = $clothes->clothes_name;
         $Price = $clothes->Price;
        $colors = colors::where('Clothesid', $Clothesid)->get();
        $reviews = reviews::where('Clothesid', $Clothesid)
                  ->orderBy('reviewdate', 'desc')
                  ->get();

    
        return view('productpage', [
            'email' => $email,
            'Clothesid' => $Clothesid,
            'clothes_name' => $clothes_name,
            'Price' => $Price,
            'colors' => $colors,
            'reviews' => $reviews
        ]);
    
    }
}
