<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{

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

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = Auth::guard('user')->user()->id;

        Listing::create($formFields);

        return redirect('/recruiter/manage')->with('message', 'Listing berhasil dibuat!!');
    }

    // Show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // update listing data
    public function update(Request $request, Listing $listing)
    {
        // make sure logged in user is owner
        if ($listing->user_id != Auth::guard('user')->id()) {
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required"],
            "location" => "required",
            "email" => ["required", "email"],
            "website" => "required",
            "tags" => "required",
            "description" => "required"
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return redirect('/recruiter/manage')->with('message', 'Listing berhasil diedit!!');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        // make sure logged in user is owner
        if ($listing->user_id != Auth::guard('user')->id()) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();

        return redirect('/recruiter/manage')->with('message', 'Listing berhasil dihapus');
    }
}
