<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data)
    {        
        $data['password'] = Hash::make($data['password']);  
        $user = User::create($data); 
        Auth::login($user);  
        return $user; 
    }

    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return true; 
        }
        return false; 
    }

    public function logout()
    {
        Auth::logout();
    }
}
