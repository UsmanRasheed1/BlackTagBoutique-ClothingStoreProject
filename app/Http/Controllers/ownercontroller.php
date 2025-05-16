<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\owners;
use App\Models\receipts;
use App\Models\customer_receipts;
use App\Models\user_view;
use App\Models\clothes;
use App\Models\colors;
use App\Models\clothes_reviews;
use App\Models\reviews;
use Illuminate\Support\Facades\DB;


class ownercontroller extends Controller
{
    public function ownerdisplayLogin()
    {
        
    
        return view('ownerloginview');
    }
    
        public function ownerlogin(request $request){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
                
            ]);
            $email = $request->input('email'); 
            $password = $request->input('password'); 
            $user = owners::where('Owner_Email', $email)->first();
            if (!$user || $password != $user->Password) {
                $request->merge(['error' => 'Invalid username or password.']);
                return $this->ownercustomerror($request);
            }
            return $this->displayownerhomepage($request);
            
        }

        public function ownercustomerror(request $request)
        {
    
        $error = $request->input('error'); // Your error message here
        if($error == null){
            $error = 'You need to login to go to this page!';
        }
        return redirect()->route('ownerlogin')->with('error', $error);
    
        } 

        public function displayownerhomepage(request $request){
            $email = $request->input('email'); 
            $user = owners::where('Owner_Email', $email)->first();
            
            $Name = $user->Name;

            $receipts = receipts::orderByDesc('ReceiptID')->get();  
            foreach($receipts as $receipt){
                $timestamp = strtotime($receipt->DeliveryDate);
            $formattedDeliveryDate = date('d-F-Y', $timestamp);
            $receipt->formattedDeliveryDate = $formattedDeliveryDate;  
                $receipt->formattedDeliveryDate;
            }

            $MaxSpending = customer_receipts::max('totalprice');
            $HSC = customer_receipts::where('totalprice',$MaxSpending)->get();  
            foreach($HSC as $receipt){
                $timestamp = strtotime($receipt->deliverydate);
            $formattedDeliveryDate = date('d-F-Y', $timestamp);
            $receipt->formattedDeliveryDate = $formattedDeliveryDate;  
                $receipt->formattedDeliveryDate;
            }
            
            $HTSC = customer_receipts::selectRaw('`Full Name`, SUM(totalprice) AS total_sum')
        ->groupBy('Full Name')
        ->havingRaw('total_sum = (SELECT MAX(sum_amount) FROM (SELECT SUM(totalprice) AS sum_amount FROM customer_receipts GROUP BY `Full Name`) AS sums)')
        ->get();

        $FC = customer_receipts::selectRaw('`full name`, COUNT(`full name`) AS Frequency')
        ->groupBy('full name')
        ->havingRaw('COUNT(`full name`) = (
            SELECT MAX(name_count) FROM (SELECT COUNT(`full name`) AS name_count FROM customer_receipts GROUP BY `full name`) AS counts
        )')
        ->get();

        $OYD = DB::table('customer_receipts')
        ->where('deliverydate', '>=', DB::raw('NOW()'))
        ->get();
        foreach($OYD as $receipt){
            $timestamp = strtotime($receipt->deliverydate);
        $formattedDeliveryDate = date('d-F-Y', $timestamp);
        $receipt->formattedDeliveryDate = $formattedDeliveryDate;  
            $receipt->formattedDeliveryDate;
        }

        $OSD = DB::table('customer_receipts')
        ->where('deliverydate', '<', DB::raw('NOW()'))
        ->get();
        foreach($OSD as $receipt){
            $timestamp = strtotime($receipt->deliverydate);
        $formattedDeliveryDate = date('d-F-Y', $timestamp);
        $receipt->formattedDeliveryDate = $formattedDeliveryDate;  
            $receipt->formattedDeliveryDate;
        }
        
        $rcptavg = round(customer_receipts::average('totalprice'), 0);
        $rcptsum =customer_receipts::sum('totalprice');
        $rcptcount = customer_receipts::count();

        $clavg = round(clothes::average('Price'), 0);
        $clsum = clothes::sum('Price');
        $clcount = clothes::count();
        $clrcount = colors::count();
        $clmax = Clothes::select('Price', 'clothes_name')->where('Price', Clothes::max('Price'))->get();
        $clmin = Clothes::select('Price', 'clothes_name')->where('Price', Clothes::min('Price'))->get();
        $clothes = Clothes::orderBy('Clothesid', 'asc')
                  ->get();
        $userview = user_view::get();

        $reviewsview = clothes_reviews::orderBy('reviewdate', 'desc')
                  ->get();

        $positive = reviews::where('sentiment', 'Positive')->count();
        $negative =  reviews::where('sentiment', 'Negative')->count();
        $neutral =  reviews::where('sentiment', 'Neutral')->count();


            return view('ownerhomepage', ['email' => $email, 'Name' => $Name,'OYD' => $OYD,'OSD' => $OSD, 'clothes' => $clothes,
             'userview' => $userview, 'clmin' => $clmin, 'clmax' => $clmax, 'clcount' => $clcount, 'clrcount' => $clrcount, 'clsum' => $clsum, 
            'clavg' => $clavg, 'rcptcount' => $rcptcount, 'rcptsum' => $rcptsum, 'rcptavg' => $rcptavg,'HSC' => $HSC, 'HTSC' => $HTSC,'FC' => $FC, 'reviews' => $reviewsview, 'positive' => $positive, 'negative' => $negative, 'neutral' =>$neutral]);
    
        }

        public function ownerdisplayaddclothes(request $request){
            $email =  $request->input('email');
            $result = DB::selectOne('SELECT FindNextAvailable() AS next_available_id');
            $nextAvailableId = $result->next_available_id;
    

            return view('owneraddclothes',['email' => $email,'nextavailableid' => $nextAvailableId]);

        }
        public function owneraddclothes(request $request){

            $request->input('Clothesid');
            $result = DB::selectOne('SELECT FindNextAvailable() AS next_available_id');
            $nextAvailableId = $result->next_available_id;
            $exists = clothes::where('Clothesid',$request->input('Clothesid'))->first();
           // echo $exists->Clothesid;
            $error = 'Incorrect ID used!';
            if($exists !== null){
                return view('owneraddclothes',['email' => $request->input('email'),'nextavailableid' => $nextAvailableId,'error' => $error]);
            }
            

             $clothes = new Clothes;

    // Assign values to the model properties
    $clothes->Clothesid = $request->input('Clothesid');
    $clothes->clothes_name = strtoupper($request->input('clothesName'));
    $clothes->category = $request->input('category');
    $clothes->Price = $request->input('price');
    $colorPaths = $request->input('colorPaths');
    $firstColorPath = $colorPaths[0] ?? null;
    $clothes->picture = $firstColorPath;
    $clothes->save();

    $colors = $request->input('colors');
    $colorPaths = $request->input('colorPaths');

    foreach ($colors as $key => $color) {
        // Create a new instance of the Color model
        $colorModel = new colors;

        // Assign values to the model properties
        $colorModel->Clothesid = $request->input('Clothesid');
        $colorModel->Color = $color;
        $colorModel->picture = $colorPaths[$key] ?? null; // Assign color path or null if not set

        // Save the color to the database
        $colorModel->save();
    }

    $result = DB::selectOne('SELECT FindNextAvailable() AS next_available_id');
            $nextAvailableId = $result->next_available_id;
            $success = 'New ID Added!';
    return view('owneraddclothes',['email' => $request->input('email'),'nextavailableid' => $nextAvailableId,'success' => $success]);

        }


        public function ownerdisplayremoveclothes(request $request){
            $email =  $request->input('email');
            return view('ownerremoveclothes',['email' => $email]);

        }

        public function ownerremoveclothes(request $request){
            $exists = clothes::where('Clothesid',$request->input('Clothesid'))->first();
            if($exists == null){
                $error = "Clothes ID " . $request->input('Clothesid') . " doesn't exist";
                return view('ownerremoveclothes',['email' => $request->input('email'),'error' => $error]);
            }
            $exists->delete();
         $success = "Clothes with ID $exists->Clothesid has been successfully removed.";
        return view('ownerremoveclothes', ['email' => $request->input('email'), 'success' => $success]);
            
        }

}
