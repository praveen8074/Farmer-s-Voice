<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            "email" => "required|string|email|max:255",
            "password" => "required|min:8",
            'role' => 'required|string|in:admin,user'
        ]);

        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === $request->role) {
                if ($user->role === 'admin') {
                    return redirect()->intended(route("posts.create"));
                } elseif ($user->role === 'user') {
                    return redirect()->intended('/user-blogs');
                }
            } else {
                Auth::logout();
                return redirect(route("login"))->with('error', "Invalid role for this user");
            }
        }
        return redirect(route("login"))->with('error', "Failed to login account");
    }

    function register()
    {
        return view("register");
    }


    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z].*$/',
            ],
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'role' => 'required|string|in:admin,user',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        if ($user->save()) {
            Mail::to($user->email)->send(new RegistrationMail($user->email, $request->password));
            return redirect(route("login"))->with("success", "User account created");
        }
        return redirect(route("register"))->with('error', "Failed to create account");
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
