<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('only.admin.login');
    }
    
    public function index() {
        if(Auth::guard('frontend')->check()) {
            return redirect(route('home'));
        }
        return view('cms.auth.login');
    }

    public function _login(LoginRequest $request)
    {
        $credential = $request->validated();
        if (Auth::guard('cms')->attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended(route('view.home.cms'));
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function _logout(Request $request)
    {
        Auth::guard('cms')->logout();
        return redirect(route('login.cms'));
    }
}
