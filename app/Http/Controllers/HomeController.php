<?php

namespace App\Http\Controllers;

use App\Travel;
use App\Switch_DB;
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
        $travels = Travel::all();

        return view('home', compact('travels'));
    }

    public function create() {
        return view('newTravel');
    }

    public function store(Request $request) {

        $newTravel = new Travel($request->all());

        
        $validatedData = $request->validate([
            'destination' => 'required',
            'intro' => 'required',
            'desc' => 'required',
            'from' => 'required',
            'to' => 'required',
            'max' => 'required'
        ]);

        $newTravel->save();

        return redirect('/home');
    }

    public function show($destination) {
        $travel = Travel::where('destination', $destination)->first();

        return view('indTravel', compact('travel'));
    }

    public function joinTravel($destination, Request $request, $username) {
        //get max num of travellers allowed to join the travel
        $max = DB::table('travels')->where('destination', $destination)->value('max');
        
        //get the num of traveller currently signed up for the travel
        $current = DB::table('switches')->where('destination', $destination)->count();

        //it looks like I have to create a switch_db
        $switch_db = new Switch_DB($request->all());

        if ($current < $max) {
            $switch_db->save();
            
            return Redirect::to('/home')->with('success', true)->with('message','Trip joined successfully!');
        } else {
            return Redirect::to('/home') -> withErrors($validator);
        }
    }
}
