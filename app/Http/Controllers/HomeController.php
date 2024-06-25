<?php

namespace App\Http\Controllers;

use App\Models\Onion;
use App\Models\Spinach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home');
    }

    public function getDataChart()
    {
        $spinachData = Spinach::select('date_input', DB::raw('group_concat(height SEPARATOR ",") as heights'))
            ->groupBy('date_input')
            ->get();

        $onionData = Onion::select('date_input', DB::raw('group_concat(height SEPARATOR ",") as heights'))
            ->groupBy('date_input')
            ->get();
        
        return response()->json([$spinachData, $onionData]);
    }
}
