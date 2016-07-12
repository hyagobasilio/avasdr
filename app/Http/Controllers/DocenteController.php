<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        return view('docentes.index');
    }
    public function login()
    {
        return view('auth.login-docente');
    }
    public function postLogin(Request $request)
    {
        $data = $request->all();
        
        $validator = validator($data, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
        
        if ($validator->fails()) 
        {
            
            return redirect('/docente/login')->withErrors($validator)
                    ->withInput();
        }
        $credencial = ['email' => $data['email'], 'password' => $data['password']];
        if (auth()->guard('docente')->attempt($credencial) )
        {
            return redirect('/docente');
        }else {
            return redirect('/docente/login')->withErrors(['errors' => 'Login Inválido!'])
                    ->withInput();
        }
        
    }
    
    public function logout()
    {
        auth()->guard('docente')->logout();
        return redirect('/');
    }
}
