<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show () {

		return view('login');
		
	}
	
	public function verify () {

		if ($_POST['login-id'] == '3' && $_POST['login-password'] == 'juan23') {
			return redirect('/home');
		} else {
			return redirect('/login');
		}
		
    }
}
