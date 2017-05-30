<?php

namespace App\Http\Controllers\Gestor;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Serie;
use App\Http\Requests\Gestor\CursoEditRequest;
use App\Http\Requests\Gestor\CursoRequest;
use App\Http\Requests\Gestor\DeleteRequest;
use Datatables;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller {
  private $serie;

  public function __construct(Serie $serie) {
    $this->serie = $serie;
    view()->share('type', 'serie');
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
  public function create(Curso $curso) {

    return view('gestores.series.create_edit', compact('curso'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CursoRequest $request) {
    Serie::create($request->all());
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param $curso
   * @return Response
   */
  public function edit(Serie $serie)
  {
      $curso = $serie->curso;
      return view('gestores.series.create_edit', compact('curso', 'serie'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param $curso
   * @return Response
   */
  public function update(CursoRequest $request, Serie $serie) {
    $serie->update($request->all());
    return redirect("/gestor/cursos/".$serie->curso_id.'/edit');

  }
  /**
   * Remove the specified resource from storage.
   *
   * @param $curso
   * @return Response
   */
  public function delete(Serie $model)
  {
    // Show the page
    return view('gestores.series.delete', compact('model'));
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param $curso
   * @return Response
   */
  public function destroy(Serie $serie)
  {
    $serie->delete();
  }

  public function data()
  {
    $selects = ['series.id', 'series.nome'];
    $cargos = $this->serie->select($selects);
    return Datatables::of($cargos)
      ->add_column('actions', '<a href="/gestor/serie/{{$id}}/edit" class="iframe"><span class="fa fa-edit"></span> Editar</a> '
      .'<a href="/gestor/serie/{{$id}}/delete" class="iframe"><span class="fa fa-trash"></span> Excluir</a>')
      ->make();
  }
}
