<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clothes;
use App\Models\colors;
use App\Models\reviews;

use Illuminate\Support\Facades\Http;

class reviewcontroller extends Controller
{
    public function submitareview(request $request){
        $Clothesid = $request->input('Clothesid');
        $review = $request->input('review');
        $email = $request->input('email');
        
        $response = Http::post('http://127.0.0.1:1212/analyze', [
        'message' => $review
    ]);

    $data = $response->json();
    $sentiment = $data["sentiment"];
       
    

        reviews::create([
                'clothesid' => $Clothesid,
                'reviewtext' => $review,
                'sentiment' => $sentiment,
                'email' => $email,


            ]);

        $newRequest = new Request([
            'email' => $request->email,
            'Clothesid' => $request->Clothesid,
        ]);

         $controller = new ProductPageController();
        return $controller->productmain($newRequest);
    
    }
}
