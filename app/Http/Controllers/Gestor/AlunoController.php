<?php 
namespace App\Http\Controllers\Gestor;

use App\Aluno;
use App\Http\Requests\Gestor\AlunoRequest;
use App\Http\Controllers\Controller;
use Hash;

class AlunoController extends Controller {
    
    public function index()
    {
        $alunos = Aluno::paginate(15);
        return view('gestores.alunos.index', compact('alunos'));
    }
    
    public function create()
    {
        return view('gestores.alunos.create_edit');
    }
    
    public function store(AlunoRequest $request)
    { 
        $data = $request->all();
        Aluno::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'password' => Hash::make($data['password'])
        ]);
        return redirect('/gestor/alunos');
    }
    public function register(\Illuminate\Http\Request $request)
    { 
        $data = $request->all();
        $messages = [
            'name.required' => 'Insira seu Nome Completo',
            'cpf.required' => 'Insira seu CPF',
            'email.required' => 'Insira seu Email',
            'password.required' => 'Insira uma Senha',
            'password.confirmed' => 'As senhas não são iguais!',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres!',
            'cpf.min' => 'O CPF deve ter 11 caracteres!',
            'cpf.max' => 'O CPF deve ter 11 caracteres!',
            ];
        
        $validator = validator($data, [
            'name' => 'required|min:3|max:100',
            'cpf' => 'required|min:11|max:11',
            'email' => 'required|email|max:100|unique:alunos',
            'password' => 'required|min:6|confirmed',
        ],$messages);
        
        if ($validator->fails()) {
            
            return redirect('aluno/login#signup')
                    ->withErrors($validator)
                    ->withInput();
        }
        Aluno::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'password' => Hash::make($data['password'])
        ]);
        return redirect('/aluno/login')->with(['success' => 'Aluno Cadastrado com Sucesso!']);
    }
    
    public function edit(Aluno $aluno)
    {
        return view('gestores.alunos.create_edit', compact('aluno'));
    }
    public function update(Aluno $aluno, \Illuminate\Http\Request $request )
    {
        $data = $request->all();
        
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users'
            
        ];
        if($request->has('password')){
            $rules['password'] = 'required|min:6|confirmed';
        }
            
        $validator = validator($data, $rules);
        
        if ($validator->fails()) {
            return redirect('gestor/alunos/create')
                    ->withErrors($validator->errors)
                    ->withInput();
        }
        $data['password'] = Hash::make($data['password']);
        
        $aluno->update($data);
        return back();
    }
    
    public function postEdit(TurmaEditRequest $request, $id)
    {
        $turma = Turma::find($id);
        $turma->nome = $request->nome;

        if($turma->save()) {
            return redirect("/gestor/turmas/$id/edit");
        }
    }
    
    public function delete(Aluno $aluno)
    {
        return view('gestores.alunos.delete', compact('aluno'));
    }
    
    public function destroy(Aluno $aluno)
    {        
        $aluno->delete();
    }
    private function validator(array $data)
    {
        return validator($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
}