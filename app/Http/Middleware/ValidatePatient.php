<?php

namespace App\Http\Middleware;

use Closure;

class ValidatePatient extends CheckRol
{
    /**
     * Handle an incoming request.
     * Comprueba que el usuario que trata de acceder a la ruta sea un Patient
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rolOfUser = $this->getRolUser();
        if ($rolOfUser !== $this->paciente) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
