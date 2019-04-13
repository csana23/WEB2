<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin', ['except' => ['logout'] ]);
    }

    public function showLoginForm() {
        return view('auth.adminLogin');
    }

    public function login(Request $request) {
        //validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        //attempt to log in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            //if succesful
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInputs($request->only('email', 'remember'));
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
