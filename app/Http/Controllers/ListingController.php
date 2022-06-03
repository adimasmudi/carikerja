<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings
    public function index()
    {

        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            // using all and find will not make it error, because it has specified in the laravel itself (i forget the detail hehe)
        ]);
    }

    // Show Spesific selected listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create()
    {
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required", Rule::unique("listings", "company")],
            "location" => "required",
            "email" => ["required", "email"],
            "website" => "required",
            "tags" => "required",
            "description" => "required"
        ]);

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing berhasil dibuat!!');
    }
}
