<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Http\Controllers\Controller;
use MedicAppServer\User;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        try {
            // $user = User::create(request(['name', 'email', 'password']));

            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password')),
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                // 'message' => 'The email or password is incorrect, please try again'
                'message' => 'Email gia usata'
            ]);
        }
        auth()->login($user);
        return redirect()->to('/login');

    }
}
