<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function showLogin()
    {
        if (auth()->check()) {
            return redirect()->route('admin-login');
        }

        return view('admin.login');
    }


    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()
                ->route('adminProduct')
                ->with('success', 'Đăng nhập thành công!');
        }

        return back()
            ->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác.',
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Đăng xuất thành công!');
    }
}
