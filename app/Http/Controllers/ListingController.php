<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {

        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::all()
            // using all and find will not make it error, because it has specified in the laravel itself (i forget the detail hehe)
        ]);
    }

    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
