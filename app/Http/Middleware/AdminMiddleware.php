<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		//dd(auth()->user()->role);
		if ((int) auth()->user()->role !== User::ROLE_ADMIN) { // можно "!== 0", но это не корректно, (int): у нас была строка(это у LVC, у нас цифра)
			abort(404); // типа нет такой страницы
		}
		return $next($request);
	}
}
