<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\{
    Login,
    UserRegistrations
};

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginRegisterController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginUs(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'user') {
                session()->flash('success', 'Login successful!');
                return redirect()->back();
            } elseif (Auth::user()->role == 'admin') {
                session()->flash('success', 'Login successful!');
                return redirect()->route('admin.index');
            } else {
                session()->flash('error', 'You are not authorized to access this page.');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Invalid credentials.');
            return redirect()->back();
        }
    }
    public function register()
    {
        return view('register');
    }
    public function registerStore(UserRegistrations $request)
    {
        try {
            User::create($request->all());
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                if (Auth::user()->role == 'user') {
                    session()->flash('success', 'Registration successful!');
                    return redirect()->back();
                } else {
                    session()->flash('error', 'You are not authorized to access this page.');
                    return redirect()->back();
                }
            } else {
                session()->flash('error', 'Invalid credentials.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
    public function logoutAndClearCache()
    {
        Auth::logout();
        Cache::flush();
        if (Auth::check() && Auth::user()->hasRole('admin')) {
            return redirect()->route('login')->with('success', 'You have been logged out.');
        } else {
            return redirect()->back()->with('success', 'You have been logged out.');
        }
    }
}
