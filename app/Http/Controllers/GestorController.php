<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class GestorController extends Controller
{
    public function index()
    {
        return view('gestores.index');
    }
    public function login()
    {
        return view('auth.login-gestor');
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
            
            return redirect('/gestor/login')->withErrors($validator)
                    ->withInput();
        }
        $credencial = ['email' => $data['email'], 'password' => $data['password']];
        if (auth()->guard('gestor')->attempt($credencial) )
        {
            return redirect('/gestor');
        }else {
            return redirect('/gestor/login')->withErrors(['errors' => 'Login Inválido!'])
                    ->withInput();
        }
        
    }
    
    public function logout()
    {
        auth()->guard('gestor')->logout();
        return redirect('/');
    }
}
