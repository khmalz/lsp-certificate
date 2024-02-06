<?php

namespace App\Http\Controllers\Admin;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $participantCount = Participant::count();

        return view('dashboard.index', compact('participantCount'));
    }
}
