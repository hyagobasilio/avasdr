<?php

namespace App\Http\Controllers\Gestor;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use App\Http\Requests\Gestor\MateriaEditRequest;
use App\Http\Requests\Gestor\MateriaRequest;
use App\Http\Requests\Gestor\DeleteRequest;
use Datatables;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller {

  public function __construct()
  {
    view()->share('type', 'materias');
  }
  /*
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
      $materias = Materia::paginate(15);
      // Show the page
      return view('gestores.materias.index', compact('materias'));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create() {
      return view('gestores.materias.create_edit');
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(MateriaRequest $request)
  {
    $materia = Materia::create($request->all());S
    return redirect("/gestor/materias");
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param $materia
   * @return Response
   */
  public function edit(Materia $materia) {
      return view('gestores.materias.create_edit', compact('materia'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param $materia
   * @return Response
   */
  public function update(MateriaRequest $request, Materia $materia)
  {
    $materia->update($request->all());
    return redirect("/gestor/materias");
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param $materia
   * @return Response
   */
  public function getDelete($id)
  {
      $materia = Materia::find($id);
      // Show the page
      return view('gestores.materias.delete', compact('user'));
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param $materia
   * @return Response
   */
  public function postDelete(DeleteRequest $request,$id)
  {
      $materia= Materia::find($id);
      $materia->delete();
  }
  /**
   * Show a list of all the languages posts formatted for Datatables.
   *
   * @return Datatables JSON
   */
  public function data()
  {
    $materias = Materia::select(array('id','codigo', 'nome'));
    
    return Datatables::of($materias)
    ->add_column('actions', '<a href="/gestor/materias/{{$id}}/edit" class="iframe" ><span class="fa fa-edit"></span>  Editar</a>
            <a href="/gestor/materias/{{$id}}/delete" class="iframe"><span class="fa fa-trash"></span> Deletar</a>')
    ->remove_column('id')
    ->make();
  }

  public function getMateriasProfessorTurma($idProfessor, $idTurma)
  {
      $materias = DB::table('materias')
          ->select('materias.id', 'materias.nome')
          ->join('professor_materia', 'professor_materia.materia_id', '=', 'materias.id')
          ->join('materia_turma', 'materia_turma.materia_id', '=', 'professor_materia.materia_id')
          ->where('professor_materia.professor_id', '=', $idProfessor)
          ->where('materia_turma.turma_id', '=', $idTurma)
          ->get();

      $dados['turmas'] = $materias;

      return response()->json($dados);

  }
}
