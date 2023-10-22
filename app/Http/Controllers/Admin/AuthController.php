<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginFormRequest;

class AuthController extends Controller
{
    public function login_page(): View
    {
        return view('admin.auth');
    }

    public function login(LoginFormRequest $request): View|RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.index'));
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
            'password' => __('auth.password')
        ]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('admin.auth.login_page');
    }
}
