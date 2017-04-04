<?php
namespace App\Http\Controllers\Gestor;

use App\Aluno;
use App\Http\Requests\Gestor\AlunoRequest;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;

class AlunoController extends Controller {

    public function index(Request $request)
    {
        $nome = $request->get('nome');

        $alunos = Aluno::where('name','like', "%$nome%")->paginate(15);
        return view('gestores.alunos.index', compact('alunos', 'nome'));
    }

    public function create()
    {
        return view('gestores.alunos.create_edit');
    }

    public function store(AlunoRequest $request)
    {
      $data = $request->all();
      $data['password'] = Hash::make($data['password']);
        Aluno::create($data);
        return redirect('/gestor/alunos');
    }

    public function edit(Aluno $aluno)
    {
        return view('gestores.alunos.create_edit', compact('aluno'));
    }
    public function update(Aluno $aluno, AlunoRequest $request )
    {
        $data = $request->all();

        if ($request->has('password')) {
          $data['password'] = Hash::make($data['password']);
        }else {
          $data = $request->except('password');
        }

        $aluno->update($data);
        return back();
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

    public function isCadastrado(Request $request)
    {
      $rs = Aluno::where('email', $request->get('email'));

      if ( $request->has('id') ) {
        $rs->where('id', '!=', $request->get('id'));
      }
      return response()->json(!$rs->exists());
    }
}
