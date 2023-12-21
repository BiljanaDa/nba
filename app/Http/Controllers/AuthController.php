<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/teams')->with('status', 'Successefully created acount');
    }

    public function login(LoginRequest $request) {
        if(Auth::check()) {
            return redirect('/login')->withErrors('You are already logged in');
        }

        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)) {
            return redirect('/login')->withErrors('Invalid credentials');
        }

        return redirect('/teams')->with('status', 'Login success!');
    }

    /**
     * Display the specified resource.
     */
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function showRegister()
    {
        return view('pages.auth.register');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/login')->with('status', 'You are logged out');
    }
}
