<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('logout');
    }
    /**
     * Display a listing of the resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->verify_string = Str::uuid()->toString();
        $user->save();
        $mailData = $user->only('email', 'verify_string');
        Mail::to($user->email)->send(new VerifyUserMail($mailData));

        return redirect('/login')->with('status', 'Successefully created acount');
    }


    public function index(LoginRequest $request) {
        if(Auth::check()) {
            return redirect('/login')->withErrors('You are already logged in');
        }

        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)) {
            return redirect('/login')->withErrors('Invalid credentials');
        }

        $user = Auth::user();
        if (!$user->email_verified_at) {
            Session::flush();
            Auth::logout();
            return redirect('/login')->with('status', 'Not verified!');
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
    public function destroy()
    {
    }

    public function verify(string $string)
    {
        $user = User::where('verify_string', $string)->first();
        if (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
        }
        return redirect('/login')->with('status', 'Succesfully verified');
    }
}
