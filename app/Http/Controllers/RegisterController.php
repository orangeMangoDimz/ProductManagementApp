<?php

namespace App\Http\Controllers;

use App\http\Modules\User\UserService;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function register()
    {
        return !auth()->user()
        ? view('auth.register')
        : redirect()->back();
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = $this->service->insertNewUser($validated);

        return $user
        ? redirect(route('home.page'))->with('success', 'Successfully Registered')
        : redirect()->back()->with('error', 'Oops, something is wrong!');
    }
}
