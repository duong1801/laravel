<?php

namespace App\Http\Controllers\Doctors\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('doctors.auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->except(['_token']);
        $checkLogin = Auth::guard('doctor')->attempt($credentials);
        if ($checkLogin) {
            if (isDoctorActive($credentials['email'])) {
                return redirect(RouteServiceProvider::DOCTOR);
            }
            return back()->with('msg', "Tài khoản chưa được kích hoạt");
        }
        return back()->with('msg', "Email hoặc mật khẩu không đúng");
    }
}
