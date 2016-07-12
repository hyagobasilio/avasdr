<?php 
namespace App\Http\Controllers\Gestor;

use App\Docente;
use App\Http\Requests\Gestor\DocenteRequest;

use App\Http\Controllers\Controller;

class DocenteController extends Controller {
    
    public function index()
    {
        $docentes = Docente::paginate(15);
        return view('gestores.docentes.index', compact('docentes'));
    }
    
    public function create()
    {
        return view('gestores.docentes.create_edit');
    }
    
    public function store(DocenteRequest $request)
    {
        
        $data = $request->all();
        
        Docente::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return back();
    }
    
    public function getEdit($id)
    {
        $turma = Turma::find($id);
        return view('gestores.turmas.create_edit', compact('turma'));
    }
    
    public function postEdit(TurmaEditRequest $request, $id)
    {
        $turma = Turma::find($id);
        $turma->nome = $request->nome;

        if($turma->save()) {
            return redirect("/gestor/turmas/$id/edit");
        }
    }
    
    public function delete(Docente $docente)
    {
        return view('gestores.docentes.delete', compact('docente'));
    }
    
    public function destroy(Docente $docente)
    {        
        $docente->delete();
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