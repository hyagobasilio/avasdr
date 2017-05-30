<?php

namespace App\Http\Controllers\Gestor;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Http\Requests\Gestor\CursoEditRequest;
use App\Http\Requests\Gestor\CursoRequest;
use App\Http\Requests\Gestor\DeleteRequest;
use Datatables;
use Illuminate\Support\Facades\DB;

class CursosController extends Controller {
  private $curso;

  public function __construct(Curso $curso) {
    $this->curso = $curso;
    view()->share('type', 'cursos');
  }

  /*
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    $cursos = $this->curso->paginate(15);
    // Show the page
    return view('gestores.cursos.index', compact('cursos'));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create() {
    $estagiosEducacionais = \App\Models\EstagioEducacional::pluck('nome', 'id')->prepend('Selecione');
    return view('gestores.cursos.create_edit', compact('estagiosEducacionais'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CursoRequest $request) {
    $curso = $this->curso->create($request->all());
    return redirect("/gestor/cursos/".$curso->id.'/edit');
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param $curso
   * @return Response
   */
  public function edit(Curso $curso)
  {
      return view('gestores.cursos.create_edit', compact('curso'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param $curso
   * @return Response
   */
  public function update(CursoRequest $request, Curso $curso) {
    $curso->update($request->all());
    return redirect("/gestor/cursos/".$curso->id.'/edit');

  }
  /**
   * Remove the specified resource from storage.
   *
   * @param $curso
   * @return Response
   */
  public function delete(Curso $curso)
  {

    // Show the page
    return view('gestores.cursos.delete', compact('curso'));
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param $curso
   * @return Response
   */
  public function destroy(Curso $curso)
  {
    $curso->delete();
  }

  public function getCursosProfessorTurma($idProfessor, $idTurma)
  {
      $cursos = DB::table('cursos')
          ->select('cursos.id', 'cursos.nome')
          ->join('professor_materia', 'professor_materia.materia_id', '=', 'cursos.id')
          ->join('materia_turma', 'materia_turma.materia_id', '=', 'professor_materia.materia_id')
          ->where('professor_materia.professor_id', '=', $idProfessor)
          ->where('materia_turma.turma_id', '=', $idTurma)
          ->get();

      $dados['turmas'] = $cursos;

      return response()->json($dados);

  }
  public function data()
  {
   $selects = array(
      'cursos.id',
      'cursos.nome'
      );

    $cargos = $this->curso->select($selects);

    return Datatables::of($cargos)
    ->add_column('actions', '<a href="/gestor/cursos" class="btn btn-success btn-xs iframe" ><span class="glyphicon glyphicon-pencil"></span></a>'
            .'<a href="/gestor/cursos" class="btn btn-xs btn-success iframe"><span class="glyphicon glyphicon-trash"></span></a>'
        )
    ->make();
  }
}
