<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    // Show apply to work form
    public function apply(Listing $listing)
    {
        return view('users.apply', [
            'listing' => $listing
        ]);
    }
}