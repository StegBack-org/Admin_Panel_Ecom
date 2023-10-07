<?php

namespace Kartikey\PanelPulse\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Kartikey\PanelPulse\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('PanelPulse::admin-login');
    }

    public function loggedIn_PostRequest(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            $request->session()->flash('warning', 'Email ID or Password does not match our records.');
            return back();
        }
    }
}
