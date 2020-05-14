<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EspecialistaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rol = $this->getRolUser();
        return view('index', ['rol' => $rol]);
    }

    /**
     * Devuelve el rol del usuario para el middleware
     * @return string
     */
    public function getRolUser(): string
    {
        $idLoggedIn = auth()->id();
        $loggedinUser = User::find($idLoggedIn);
        $rolOfUser = $loggedinUser->rol;
        return $rolOfUser;
    }
}
