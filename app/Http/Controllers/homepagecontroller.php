<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\clothes;
use App\Models\colors;

class homepagecontroller extends Controller
{

    public function displayhomepage(request $request){
        $email = $request->input('email');
        if($email != null){
            // If email is provided, retrieve user details
            $user = user::where('Email', $email)->first();
            $Name = $user->First_Name . ' ' . $user->Last_Name;
        }
        else {
            // If email is not provided, set name to 'Anonymous'
            $Name = 'Anonymous';
        }
        return view('/homepage',['email' => $email, 'name' => $Name]);
    }
    public function cataloguefunc(request $request){
        $category = $request->input('category');
        $search = $request->input('search');
        $email = $request->input('email');
        
        if($email != null){
            // If email is provided, retrieve user details
            $user = user::where('Email', $email)->first();
            $Name = $user->First_Name . ' ' . $user->Last_Name;
        }
        else {
            // If email is not provided, set name to 'Anonymous'
            $Name = 'Anonymous';
        }

        // Retrieve clothes based on the provided category, ordered by price ascending

        if ($category != null) {
            // If category is specified, filter by category and apply price range
            $query = clothes::where('category', $category);
        } else {
            // If searching for a specific item, apply name filter and price range
            $query = clothes::where('clothes_name', 'like', '%' . $search . '%');
        }
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $cltext = $request->input('cltext');
        // Add price range filtering
        if (isset($minPrice)) {
            $query->where('price', '>=', $minPrice);
        }
        
        if (isset($maxPrice)) {
            $query->where('price', '<=', $maxPrice);
        }
        if ($cltext != null) {
            $query->where('clothes_name', 'like', '%' . $cltext . '%');
        }
        
        // Execute the query and get the results
        $clothes = $query->orderBy('price', 'asc')->get();
        // Pass data to the 'cataloguepage' view and render it
        return view('cataloguepage', ['email' => $email, 'Name' => $Name,'category' => $category,'search' => $search, 'clothes' => $clothes,'minPrice' => $minPrice, 'maxPrice' => $maxPrice,'cltext' => $cltext ]);
        
    }
}
