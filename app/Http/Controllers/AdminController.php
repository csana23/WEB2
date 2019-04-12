<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requests;

use App\Travel;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
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

        //risky play
        try {
            $newTravel->save();

        } catch(Exception $e) {
            if ($e instanceof QueryException) {
                return redirect('home')->with('error', 'This destination is already in the database!');
            } else {
                return redirect('home')->with('error', 'Something went wrong!');
            }
        }

        

        return redirect('/admin');
    }
}