<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $user = $this->getUser();
        $acronym = $this->acronymName();
        $modules = $this->getModules();

        return view('index', [
            'acronym' => $acronym,
            'modules' => $modules,
            'user' => $user
        ]);
    }

    /**
     * Retorna el Usuario
     * @return object|null
     */
    public function getUser()
    {
        $idLoggedIn = auth()->id();
        $loggedinUser = User::find($idLoggedIn);
        return $loggedinUser;
    }

    /**
     * Devuelve las iniciales del usuario
     * @return string $acronym 
     */
    public function acronymName()
    {
        $user = $this->getUser();
        $name = $user->name;
        $charName =  explode(' ', $name);
        if (count($charName) > 1) {
            $acronym = '';
            foreach ($charName as $row) {
                $letter[] = $row[0];
                $acronym = strtoupper(implode('', $letter));
            }
            return $acronym;
        }
        return strtoupper($name);
    }

    /**
     * Devuelve arreglo de modulos disponibles
     * @return array $modules
     */
    public function getModules()
    {
        $user = $this->getUser();
        $modules = $user->Modules()->get()->all();
        return $modules;
    }

    /**
     * Devuelve arreglo de mascotas disponibles
     * @param int $id
     * @return array $modules
     */
    public function getPetsById(int $id)
    {
        $user = User::find($id);
        $pets = $user->Pets()->get()->all();
        return $pets;
    }

    /**
     * Actualiza los datos del usuario
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $user = $this->getUser();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $user->update();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function updateByApi(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(User $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        return redirect()->back()->with('message', 'Registro eliminado');
    }
}
