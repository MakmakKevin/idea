<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request){

        $request->validate([
            'name'=> ['required','string','min:3','max:255'],
            'email' => ['required','string','email','max:255',Rule::unique('users','email')],
            'password' => ['required','string','min:8','max:225'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        //Fire here register event that triggers verification email

        return redirect('/')->with('success','Your account has been created successfully');
    }
}
