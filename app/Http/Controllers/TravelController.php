<?php

namespace App\Http\Controllers;

use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class TravelController extends Controller
{
    public function index() {
        return view('home');
    }

    public function create() {
        return view('newTravel');
    }

    public function show($destination) {
        $travel = Travel::find('destination');

        return view('indTravel', compact('travel'));
    }
}
