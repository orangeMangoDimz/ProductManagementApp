<?php

namespace App\Http\Controllers;

use App\http\Modules\User\UserService;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function login()
    {
        return !auth()->check() ? view('auth.login') : redirect()->back();
        // return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $validated = $request->validated();
        $status = $this->service->login($validated);

        return $status
        ? redirect(route('home.page'))->with(['success', 'username'], ['Successfully Log In!', $validated["email"]])
        : redirect()->back()->withErrors(['email' => 'Email or password is not match!'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home.page'))->with('success', 'Successfully Log Out!');
    }
    
}
