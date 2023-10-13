<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if(!auth()->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
            return back()->with('status', 'Invalid login status!');
        }

        return redirect()->route('home');
    }
}
