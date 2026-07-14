<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SessionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','string','email','max:255'],
            'password' => ['required','string','min:8','max:225'],
        ]);

        if(!Auth::attempt($credentials)){
            return back()
            ->withErrors(['password' => 'Invalid credentials'])
            ->withInput();
        }

        $request->session()->regenerate();

        return redirect()->intended('/')->with('success','Welcome back!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/')->with('success','You have been logged out successfully');
    }
}
