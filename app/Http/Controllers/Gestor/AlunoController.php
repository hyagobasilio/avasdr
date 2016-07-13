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
        /*$validator = validator($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        
        if ($validator->fails()) {
            
            return redirect('gestor/alunos/create')
                    ->withErrors($validator)
                    ->withInput();
        } */
        Aluno::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'password' => Hash::make($data['password'])
        ]);
        return redirect('/aluno');
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