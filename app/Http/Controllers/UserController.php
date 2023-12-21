<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class UserController extends Controller
{
	//
	public function auth(Request $req)
	{
		// Guardamos en una variable los datos que nos llegan por POST
		$credentials = $req->only('user_email', 'user_pass');
		
		// Comprobamos si los datos son correctos
		if(Auth::attempt(['email' => $credentials['user_email'], 'password' => $credentials['user_pass']]))
		{
			// Si son correctos, redirigimos a la página de inicio
			return redirect()->intended(RouteServiceProvider::HOME);
		}

		// Si no son correctos volvemos al login y mostramos un error
		return back()->withErrors([
			'error' => 'Las credenciales introducidas no son correctas.',
		]);
	}

	public function logout()
	{
		Auth::logout();
    return redirect('/');
	}
}
