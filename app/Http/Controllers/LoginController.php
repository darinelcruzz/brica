<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        if (Auth::attempt(['user' => $request->user, 'password' => $request->password])) {
            return redirect()->intended('/');
        }

        return redirect('/');
    }
}
