<?php

namespace App\Http\Controllers;

use App\Travel;
use App\Switches;
use App\User;
use App\Http\Controllers\Auth\RegisterController;
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

    public function joinTravel($destination, Request $request) {
        //create instance of RegisterController
        $data = new RegisterController();

        //email of user
        $email = 'richard.csanaki@gmail.com';

        //get max num of travellers allowed to join the travel
        $max = DB::table('travels')->where('destination', $destination)->value('max');
        
        //get the num of traveller currently signed up for the travel
        $current = DB::table('switches')->where('destination', $destination)->count();

        //sending it to view
        View::make('indTravel',['current' => $current]);

        //switches
        $switches = new Switches($request->all());
        $switches['destination'] = $destination;
        $switches['email'] = $email;

        if ($current < $max) {
            $switches->save();

            $successMessage = 'Trip to ' . $destination . ' joined successfully';
            $failMessage = "We're sorry, the trip to " . $destination . " is ful!";

            return redirect('/home')->with('status', $successMessage);
        } else {
            return redirect('/home') -> with('status', $failMessage);
        } 
    }
}
