<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\AuthService;

class RegisterController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration request
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
    
        try {
            $user = $this->authService->register($data);
    
            return back()->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Registration failed. Please try again.');
        }
    }
    
}
