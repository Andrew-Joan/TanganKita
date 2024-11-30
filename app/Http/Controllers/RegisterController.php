<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        
        // pake create aja ga pake insert($validatedData), biar password auto-hash karena di model udah di cast hashed
        User::create([
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'name' => $validatedData['name'],
            'date_of_birth' => $validatedData['date_of_birth'],
        ]);

        return to_route('login')->with('success', 'Registrasi berhasil');
    }
}
