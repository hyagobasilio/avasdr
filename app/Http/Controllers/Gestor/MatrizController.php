<?php

namespace App\Http\Controllers\Gestor;

use App\Http\Controllers\Controller;
use App\Models\Matriz;
use App\Models\Curso;
use App\Http\Requests\Gestor\MatrizRequest;
use Datatables;
use Illuminate\Support\Facades\DB;

class MatrizController extends Controller {
  private $matriz;

  public function __construct(Matriz $matriz) {
    $this->matriz = $matriz;
    view()->share('type', 'matriz');
  }

  /*
  * Display a listing of the resource.
  *
  * @return Response
  */
  public function index()
  {
    //$cursos = $this->curso->paginate(15);
    // Show the page
    return view('gestores.matriz.index');
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $cursos = Curso::pluck('nome', 'id')->prepend('Selecione', '');
    return view('gestores.matriz.create_edit', compact('cursos'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(MatrizRequest $request) {
    $matriz = Matriz::create($request->all());
    return redirect("/gestor/matriz/".$matriz->id.'/edit');
  }
  /**
   * Show the form for editing the specified resource.
   *
   * @param $curso
   * @return Response
   */
  public function edit(Matriz $matriz)
  {
    $cursos = Curso::pluck('nome', 'id')->prepend('Selecione', '');
    return view('gestores.matriz.edit', compact('matriz', 'cursos'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param $curso
   * @return Response
   */
  public function update(MatrizRequest $request, Matriz $matriz) {
    $matriz->update($request->all());
    return redirect("/gestor/matriz/".$matriz->id.'/edit');

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


  public function data()
  {
    $selects = [
      'matriz.id',
      'matriz.codigo',
      'matriz.nome'
    ];

    $matriz = $this->matriz->select($selects);

    return Datatables::of($matriz)
    ->add_column('actions', '<a href="/gestor/matriz/{{$id}}/edit"><span class="fa fa-edit"></span> Editar</a> '
    .'<a href="/gestor/matriz/{{$id}}/delete" class="iframe"><span class="fa fa-trash"></span> Excluir</a>')
    ->remove_column('id')
    ->make();
  }
}
