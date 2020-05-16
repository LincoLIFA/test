<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EspecialistaController extends UserController
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
        $idLoggedIn = auth()->id();
        $user = User::find($idLoggedIn);
        $profile = $user->profile()->get();
        $id = $profile->first()->tag;


        $rol = $this->getRolUser();
        return view('index', ['rol' => $rol]);
    }
}
