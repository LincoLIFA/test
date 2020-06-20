<?php

namespace App\Http\Controllers;

use App\Pets;
use App\Type_pets;
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

    /**
     * Ingresa nueva mascota al sistema 
     * @param Request $request 
     * @return mixed
     */
    public function create(Request $request)
    {
        $idOwner = $request->owner;
        $user = User::find($idOwner);
        if (!is_null($user)) {

            $pet = new Pets();
            $pet->user_id = $idOwner;
            $pet->type_id = $request->type;
            $pet->name = $request->name;
            $pet->edad = $request->edad;
            $pet->sexo = $request->sexo;
            $pet->save();
        }
    }

    public function profilePets()
    {
        $users = User::all();
        $typePets = Type_pets::all();
        $acronym = $this->acronymName();
        $modules = $this->getModules();

        return view('pets.new-pets', [
            'users' => $users,
            'type' => $typePets,
            'acronym' => $acronym,
            'modules' => $modules
        ]);
    }
}
