<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends UserController
{

    /** Controllador para los cambios en los perfiles */


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
        $acronym = $this->acronymName();
        $modules = $this->getModules();

        return view('profile.profile', [
            'acronym' => $acronym,
            'modules' => $modules,
            'user' => $user
        ]);
    }

    public function showOwner()
    {
        $users = User::with('pets')->get();
        $pets = [];
        foreach ($users as $user) {
            $id = $user->id;
            $pets[$id] = $this->getPetsById($id);
        }
        $acronym = $this->acronymName();
        $modules = $this->getModules();

        return view('owner.owner', [
            'acronym' => $acronym,
            'modules' => $modules,
            'users' => $users,
            'pets' => $pets[$id]
        ]);
    }

    /**
     * Retorna el perfil del dueño de una mascota
     * @param int $id
     * @return mixed
     */
    public function showProfile(int $id)
    {
        $acronym = $this->acronymName();
        $modules = $this->getModules();
        $user = User::find($id);
        $pets = $this->getPetsById($id);
        return view('profile.edit-owner', [
            'acronym' => $acronym,
            'modules' => $modules,
            'user' => $user,
            'pets' => $pets
        ]);
    }
}
