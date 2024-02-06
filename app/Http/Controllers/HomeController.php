<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->filled('search')) {
            $participants = Participant::with('certificate')->when($request->has('search'), function ($query) use ($request) {
                return $query->whereName($request->search);
            })->get();
        } else {
            $participants = [];
        }


        return view('home', compact('participants'));
    }
}
