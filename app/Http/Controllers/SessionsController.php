<?php

namespace MedicAppServer\Http\Controllers;

use Illuminate\Http\Request;
use MedicAppServer\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();

            return $next($request);
        });
    }

    public function create() {
        return view('login');
    }

    public function store() {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                // 'message' => 'The email or password is incorrect, please try again'
                'message' => 'La email o la password sono errate, per favore riprova'
            ]);
        }

        return redirect()->to('/pazienti');
    }

    public function destroy() {
        auth()->logout();

        return redirect()->to('/pazienti');
    }
}
