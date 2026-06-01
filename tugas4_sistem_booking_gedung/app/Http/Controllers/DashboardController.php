<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $visitCount = $request->session()->get('visit_count', 0);
        $firstVisit = $request->session()->get('first_visit', null);
        $now = Carbon::now()->translatedFormat('d F Y, H:i:s');
        $visitCount++;
        if (!$firstVisit) {
            $request->session()->put('first_visit', $now);
            $firstVisit = $now;
        }
        $request->session()->put('visit_count', $visitCount);
        $request->session()->put('last_visit', $now);
        $lastVisit = $now;
        return view('dashboard', compact('visitCount', 'firstVisit', 'lastVisit'));
    }

    public function resetVisit(Request $request)
    {
        $request->session()->forget(['visit_count', 'first_visit', 'last_visit']);
        return redirect()->route('dashboard')->with('success', 'Hitungan kunjungan berhasil diulang dari awal!');
    }
}
