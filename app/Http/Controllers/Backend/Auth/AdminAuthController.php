<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Campaign;
use App\Models\Product;
use Auth;
use Setting;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.auth.login');
    }

    public function dashboard()
    {
        $productCount = Product::all()->count();
        $campaignCount = Campaign::all()->count();
        return view('backend.dashboard',compact('productCount', 'campaignCount'));
    }

    public function login()
    {
        if (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            //user sent their email
            Auth::guard('admin')->attempt(['email' => request()->email, 'password' => request()->password]);
        }

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard')->with('status', 'Welcome');
        } else {
            return back()->withErrors(['Details are not correct']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.showLoginForm')->with('status', 'Welcome');
    }
}
