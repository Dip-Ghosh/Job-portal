<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginValidationRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(AdminLoginValidationRequest $request)
    {
        if (!Auth::attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors('Invalid Email or Password')->withInput();
        }
        return view('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
