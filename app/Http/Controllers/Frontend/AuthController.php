<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LoginRequest;
use App\Http\Requests\Frontend\RegisterRequest;
use App\Models\Masyarakat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('only.mys.login');
    }

    public function indexLogin() {
        return view('frontend.auth.login');
    }

    public function indexRegister() {
        return view('frontend.auth.register');
    }

    public function _login(LoginRequest $request) {

        $credential = $request->validated();
        if (Auth::guard('frontend')->attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'Username' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function _register(RegisterRequest $request) {
        $credential = Arr::except($request->validated(), ['image', 'user_password']);
        $image = $request->validated('image');
        try {
            DB::transaction(function () use ($credential, $image) {
                $masyarakat = Masyarakat::create($credential);
                $masyarakat->avatar()->create([
                    'url' => $image
                ]);
            });
            return redirect(route('login'))->with('success', 'Berhasil mendaftarkan pengguna baru');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function _logout(Request $request) {
        Auth::guard('frontend')->logout();
        return redirect('/');
    }
}
