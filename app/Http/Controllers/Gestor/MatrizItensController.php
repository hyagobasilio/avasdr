<?php

namespace App\Http\Controllers\Gestor;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use App\Models\Matriz;
use App\Models\MatrizItens;
use App\Http\Requests\Gestor\MatrizRequest;
use App\Http\Requests\Gestor\MatrizItensRequest;
use Datatables;
use Illuminate\Support\Facades\DB;

class MatrizItensController extends Controller {
  private $matrizItens;

  public function __construct(MatrizItens $matrizItens) {
    $this->matrizItens = $matrizItens;
    view()->share('type', 'matriz-itens');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create(Matriz $matriz)
  {
    $disciplinas = Materia::pluck('nome', 'id')->prepend('Selecione', '');
    return view('gestores.matriz-itens.create_edit', compact('matriz', 'disciplinas'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(MatrizItensRequest $request) {
    MatrizItens::create($request->all());
    
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param $curso
   * @return Response
   */
  public function edit(Matriz $matriz)
  {
      return view('gestores.matriz.edit', compact('matriz'));
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


  public function data(Matriz $matriz)
  {
    $selects = [
      'matriz_itens.id',
      'materias.nome',
      'matriz_itens.carga_horaria'
    ];

    $matriz = $this->matrizItens->select($selects)
    ->join('materias', 'matriz_itens.materia_id', '=', 'materias.id')
    ->where('matriz_id', $matriz->id);

    return Datatables::of($matriz)
    ->add_column('actions', '<a href="/gestor/matriz/{{$id}}/edit"><span class="fa fa-edit"></span> Editar</a> '
    .'<a href="/gestor/matriz/{{$id}}/delete" class="iframe"><span class="fa fa-trash"></span> Excluir</a>')
    ->remove_column('id')
    ->make();
  }
}
