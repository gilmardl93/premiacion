<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if(Auth::attempt(['dni' => $request->dni, 'password' => $request->password]))
        {
            return redirect('/');
        }else 
        {
            return redirect('login')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>USUARIO Y CLAVE INCORRECTO !!</strong> Debe ingresar nuevamente.</div>');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('login');
    }

    protected function guard()
    {
        return Auth::guard();
    }
        
}
