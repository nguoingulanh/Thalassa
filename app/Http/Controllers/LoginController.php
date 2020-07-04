<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function handleLogin(LoginRequest $request)
    {
        $email    = $request['email'];
        $password = $request['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password],true)) {
            return redirect(route('category.get'));
        }
        return back()->withInput()->with('error','Email or Password false!');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('customer.login'));
    }
}
