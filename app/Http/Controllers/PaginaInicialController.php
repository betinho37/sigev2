<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaInicialController extends Controller
{
	public function index()
	{
		return view('/paginainicial');
	}

	/*public function login()
	{
		return view('auth.login');
	}

	public function logout(Request $request)
{
     \Auth::logout();
    return redirect('/login');
}*/


}
