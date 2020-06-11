<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetsController extends UserController
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

    public function index()
    {
        $user = $this->getUser();
        $pets = $this->getPets();
        $acronym = $this->acronymName();
        $modules = $this->getModules();

        return view('pets.pets', [
            'acronym' => $acronym,
            'modules' => $modules,
            'user' => $user,
            'pets' => $pets
        ]);
    }

    /**
     * Entrega arreglo de mascotas
     * @return array $pets
     * @return string 
     */
    public function getPets(): array
    {
        $user = $this->getUser();
        $pets = $user->Pets()->get()->all();
        if (is_null($pets)) {
            return 'No hay registro';
        }
        return $pets;
    }
}
