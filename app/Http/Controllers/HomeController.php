<?php

namespace App\Http\Controllers;

use App\Travel;
use Illuminate\Http\Request;

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
        $travels = Travel::all();

        return view('home', compact('travels'));
    }

    public function create() {
        return view('newTravel');
    }

    public function show($destination) {
        $travel = Travel::find('destination');

        return view('indTravel', compact('travel'));
    }
}
