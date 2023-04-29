<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formUsers = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6' ]
        ]);

        // Has Password
        $formUsers['password'] = bcrypt($formUsers['password']);
        // create User
        $user = User::create($formUsers);

        // login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formUsers = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($formUsers)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
