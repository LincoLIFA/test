<?php

namespace App\Http\Controllers;

use App\Pets;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function showApiPets()
    {
        return Pets::all();
    }

    public function showApiOwnerPets()
    {
        $users = User::with('pets')->get();


        return  [
            'users' => $users,
        ];
    }
}
