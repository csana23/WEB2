<?php

namespace App\Http\Controllers;

use App\Travel;
use App\Switches;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Database\QueryException;

class OthersHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $travels = Travel::all()
                    ->sortByDesc('from');

        return view('othersHome', compact('travels'));
    }

    /* public function othersIndex() {
        $travels = Travel::all()
                    ->sortByDesc('from');

        return view('othersHome', compact('travels'));
    } */

    /* public function create() {
        return view('newTravel');
    } */

    /* public function store(Request $request) {

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
    } */

    public function show($destination) {
        $travel = Travel::where('destination', $destination)->first();
        $current = DB::table('switches')->where('destination', $destination)->count();

        //return view indTravel with variables
        return view('indTravel', compact('travel'), ['current' => $current]);
    }

    public function joinTravel($destination, Request $request) {
        //email of user using Auth facade
        $user = Auth::user();
        $email = $user->email;

        //get max num of travellers allowed to join the travel
        $max = DB::table('travels')->where('destination', $destination)->value('max');
        
        //get the num of traveller currently signed up for the travel
        $current = DB::table('switches')->where('destination', $destination)->count();

        //switches
        $switches = new Switches($request->all());
        $switches['destination'] = $destination;
        $switches['email'] = $email;

        //try catch baby - if Exception instanceof QueryException then "You've already joined this trip"
        try {
            if ($current < $max) {
                $switches->save();

                $successMessage = 'Trip to ' . $destination . ' joined successfully';

                return redirect('/home')->with('status', $successMessage);
            } else {
                $failMessage = 'We are sorry, the trip to ' . $destination . ' is full!';

                return redirect('/home') -> with('error', $failMessage);
            }
        } catch(Exception $e) {
            if ($e instanceof QueryException) {
                return redirect('home')->with('error', 'You have already joined this trip!');
            } else {
                return redirect('home')->with('error', 'Something went wrong!');
            }
        }

            
    } 
}
