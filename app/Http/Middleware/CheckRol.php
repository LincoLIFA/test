<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use App\Http\Controllers\EspecialistaController;
use App\Http\Controllers\PacienteController;


class CheckRol
{
	/**
	 * Declara el rol del Especialista
	 * @var string
	 */
	protected $especialista = "Especialista";

	/**
	 * Declara el rol del Paciente
	 * @var string
	 */
	protected $paciente = "Paciente";


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 * @return string
	 */
	public function handle($request, Closure $next)
	{
		$rolOfUser = $this->getRolUser();
		if ($rolOfUser === $this->especialista) {
			return redirect()->action([EspecialistaController::class, 'index']);
		} elseif ($rolOfUser === $this->paciente) {
			return redirect()->action([PacienteController::class, 'index']);
		}
		return $next($request);
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
