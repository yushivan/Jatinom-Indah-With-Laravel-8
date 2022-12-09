<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use App\Models\Admin\Ulasan;
use Illuminate\Http\Request;
// use Auth;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function halamanlogin()
    {
        return view('/user/v_login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/shop-user');
        }
        return redirect('/login-user');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}