<?php

namespace App\Http\Controllers;

use App\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index() {
        $travels = Travel::all();

        return view('home', compact('travels'));
    }

    public function create() {
        return view('newTravel');
    }

    public function store(Request $request) {
        $newTravel = new Travel($request->all());
        echo $request;
        $newTravel->save();

        return redirect('/home');
    }

    public function show($destination) {
        $travel = Travel::find('destination');

        return view('indTravel', compact('travel'));
    }
}
