<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    // Show apply to work form
    public function apply(Listing $listing)
    {
        return view('apply.apply', [
            'listing' => $listing
        ]);
    }

    public function manage()
    {
        return view('apply.manage_apply');
    }
}
