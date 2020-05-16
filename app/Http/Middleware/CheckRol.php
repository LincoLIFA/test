<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use App\Http\Controllers\EspecialistaController;
use App\Http\Controllers\PacienteController;


class CheckRol
{
	/**
	 * Handle an incoming request.
	 * Comprueba el Tipo de Rol del usuario y redirecciona al controllador correspondiente.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 * @return string
	 */
	public function handle($request, Closure $next)
	{
		$uid = auth()->id();
		$rolOfUser = $this->getRolUser($uid);
		$uProfile = $this->getProfileUser($uid);

		if ($rolOfUser === $uProfile) {
			return redirect()->route($uProfile);
		}
		return $next($request);
	}

	/**
	 * Devuelve el perfil del usuario para el middleware
	 * @param int $uid
	 * @return string
	 */
	protected function getRolUser(int $uid): string
	{
		$loggedinUser = User::find($uid);
		return $loggedinUser->rol;
	}

	/**
	 * Obtiene el Perfil asignado al Usuario
	 * @param int $uid
	 * @return string
	 */
	protected function getProfileUser(int $uid): string
	{
		$user = User::find($uid);
		$profile = $user->profile()->get();
		return $profile->first()->name;
	}
}
