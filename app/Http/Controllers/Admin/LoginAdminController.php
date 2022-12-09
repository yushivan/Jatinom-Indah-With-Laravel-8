<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Models\Admin\Ulasan;
use Illuminate\Http\Request;
use Auth;

class LoginAdminController extends Controller
{
    public function halamanlogin(){
        return view('admin/login/login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/admin/dashboard');
        }
        return redirect('/admin/login');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/');
    }
}