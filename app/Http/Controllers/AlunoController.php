<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        return view('alunos.index');
    }
    public function login()
    {
        return view('auth.login-aluno');
    }
    public function postLogin(Request $request)
    {
        $data = $request->all();
        
        $validator = validator($data, [
            'email' => 'required|email|min:3|max:100',
            'password' => 'required|min:3|max:100',
        ]);
        
        if ($validator->fails()) 
        {
            return redirect('/aluno/login')->withErrors($validator)
                    ->withInput();
        }
        $credencial = ['email' => $data['email'], 'password' => $data['password']];
        
        if (auth()->guard('aluno')->attempt($credencial) ) {
        
            return redirect('/aluno');
        }else {
           
            return redirect('/aluno/login')->withErrors(['errors' => 'Login Inválido!'])
                    ->withInput();
        }
        
    }
    
    public function logout()
    {
        auth()->guard('aluno')->logout();
        return redirect('/');
    }
}
