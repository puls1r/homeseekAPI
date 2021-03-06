<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\User;
use App\ListingFacility;

class ListingController extends Controller
{
    public function getBestSeller(){
        $listing = Listing::inRandomOrder()->take(6)->get();
        return json_encode($listing, 200);
    }

    public function getPremiumListing(){
        $listing = Listing::inRandomOrder()->take(2)->get();
        return json_encode($listing, 200);
    }
    
    public function show($id){
        $listing = Listing::where('id_properti', $id)->with('listing_facilities')->first();
        $marketing = User::where('id', $listing->id_admin)->first();
        return json_encode(['listing' => $listing, 'marketing' => $marketing], 200);
    }

}
