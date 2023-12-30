<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function loadLogin()
    {
        if (Auth::user()) {
            return redirect('/');
        }
        return view('login');
    }

    public function loadRegister()
    {
        if (Auth::user()) {
            return redirect('/');
        }
        return view('registration');
    }

    public function register(Request $request)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect('login')->with('success', 'Registerd succesfully');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect('/'); // Redirect to the dashboard or any other authenticated route
        }

        // Authentication failed
        return back()->withErrors(['error' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request) {
        Auth::logout();
    
        return redirect('/login-user'); 
    }

    public function toDashboard(){
        if(Auth::check() && Auth::user()->id == 2){
            return redirect('admin/dashboard');
        }
        if(Auth::check() && Auth::user()->id == 1){
            return redirect('/');
        }
    }
}
